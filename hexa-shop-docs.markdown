```markdown
# Báo cáo Hướng dẫn Cài đặt và Quản lý Dự án Laravel với Docker

## 1. Giới thiệu
Dự án Laravel của bạn (`hexa-shop`) đã được thiết lập để chạy với Docker, bao gồm các dịch vụ: `app` (PHP-FPM), `mysql` (MySQL 8.0), `nginx` (web server), và `mailpit` (email testing). Báo cáo này tổng hợp các bước cài đặt, khắc phục lỗi, chạy ứng dụng trên trình duyệt, và thêm dữ liệu vào cơ sở dữ liệu. Báo cáo được cập nhật vào lúc 11:58 PM +07, Thứ Năm, 10/07/2025.

## 2. Yêu cầu hệ thống
- Đã cài đặt **Docker** và **Docker Compose**.
- Đã cài đặt **Node.js** và **npm** trên máy chủ để xử lý các dependencies frontend (nếu có).
- Các cổng `80`, `3306`, `8025`, `1025`, và `9000` không bị chiếm dụng.

## 3. Các bước thực hiện

### 3.1. Cấu hình ban đầu
#### Kiểm tra và chỉnh sửa file cấu hình
- **File `.env`**:
  - Cập nhật các biến môi trường để khớp với `docker-compose.yml`:
    ```
    APP_NAME=HexaShop
    APP_ENV=local
    APP_KEY= (sẽ tạo sau)
    APP_DEBUG=true
    APP_URL=http://localhost
    DB_HOST=hexa-shop-mysql
    DB_PORT=3306
    DB_DATABASE=hexa_shop_db
    DB_USERNAME=hexa_shop_user
    DB_PASSWORD=userpassword
    MAIL_HOST=mailpit
    MAIL_PORT=1025
    ```
  - **Giải thích**: Đảm bảo các thông tin kết nối cơ sở dữ liệu và email khớp với container tương ứng.

- **File `nginx.conf`**:
  - Đảm bảo cấu trúc đúng:
    ```
    http {
        server {
            listen 80;
            server_name localhost;
            root /var/www/public;
            index index.php index.html;
            location / {
                try_files $uri $uri/ /index.php?$query_string;
            }
            location ~ \.php$ {
                fastcgi_pass app:9000;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                include fastcgi_params;
            }
            location ~ /\.ht {
                deny all;
            }
        }
    }
    ```
  - **Giải thích**: File này cấu hình Nginx để phục vụ ứng dụng Laravel và chuyển tiếp request PHP sang PHP-FPM.

#### Cài đặt dependencies frontend
- **Câu lệnh**:
  ```bash
  cd /đường/dẫn/đến/thư/mục/dự/án
  npm install
  ```
  - **Giải thích**: Cài đặt các gói Node.js được liệt kê trong `package.json` (nếu dự án sử dụng Laravel Mix hoặc Vite). Thực hiện lệnh này trên máy chủ, không trong container, vì `node` và `npm` không được cài trong container `app`.
  - **Kết quả mong đợi**: Các thư viện frontend (CSS, JS) được cài vào thư mục `node_modules`.

#### Khởi tạo và chạy container
- **Câu lệnh**:
  ```bash
  docker-compose up -d --build
  ```
  - **Giải thích**: Xây dựng và khởi động các container ở chế độ background.
  - **Kết quả mong đợi**: Tất cả container (`hexa-shop-app`, `hexa-shop-mysql`, `hexa-shop-nginx`, `mailpit`) chạy (xác nhận bằng `docker-compose ps`).

### 3.2. Cấu hình ứng dụng Laravel
#### Tạo khóa ứng dụng
- **Câu lệnh**:
  ```bash
  docker-compose exec app php artisan key:generate
  ```
  - **Giải thích**: Tạo và cập nhật `APP_KEY` trong `.env` để bảo mật ứng dụng.
  - **Kết quả mong đợi**: `APP_KEY` được tạo và ghi vào `.env`.

#### Cấu hình quyền thư mục
- **Câu lệnh**:
  ```bash
  docker-compose exec app chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
  docker-compose exec app chmod -R 775 /var/www/storage /var/www/bootstrap/cache
  ```
  - **Giải thích**: Đặt quyền sở hữu và quyền truy cập để Laravel có thể ghi file trong `storage` và `cache`.
  - **Kết quả mong đợi**: Không có lỗi, quyền được cập nhật.

### 3.3. Khắc phục lỗi và kiểm tra log
#### Kiểm tra log container
- **Câu lệnh**:
  ```bash
  docker-compose logs app
  docker-compose logs mysql
  docker-compose logs nginx
  ```
  - **Giải thích**: Xem log để phát hiện lỗi (ví dụ: lỗi cú pháp `nginx.conf`, kết nối MySQL).
  - **Kết quả mong đợi**: Log cho thấy trạng thái `ready` (PHP-FPM, MySQL) hoặc lỗi cần sửa (Nginx).

#### Sửa lỗi Nginx
- Nếu log Nginx báo lỗi `"server" directive is not allowed here`:
  - Mở và sửa `./nginx.conf` để đảm bảo `server` nằm trong khối `http`.
  - Rebuild và khởi động lại:
    ```bash
    docker-compose down
    docker-compose up -d --build
    ```

### 3.4. Chạy ứng dụng trên trình duyệt
- **Câu lệnh**:
  ```bash
  docker-compose ps
  ```
  - **Giải thích**: Xác nhận `hexa-shop-nginx` chạy trên cổng `0.0.0.0:80->80/tcp`.
- **Truy cập**:
  - Mở trình duyệt và nhập: `http://localhost`.
  - **Giải thích**: Nginx phục vụ ứng dụng qua cổng `80`.
  - **Kết quả mong đợi**: Trang Laravel xuất hiện. Nếu lỗi (502, 404), kiểm tra log:
    ```bash
    docker-compose logs nginx
    docker-compose logs app
    ```

### 3.5. Thêm dữ liệu vào cơ sở dữ liệu
#### Tạo và áp dụng Migration
- **Câu lệnh**:
  ```bash
  docker-compose exec app php artisan make:migration create_categories_table
  docker-compose exec app php artisan make:migration create_products_table
  ```
  - **Giải thích**: Tạo file migration cho bảng `categories` và `products`.

- **Nội dung Migration**:
  - `create_categories_table.php`:
    ```php
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->timestamps();
        });
    }
    ```
  - `create_products_table.php` (sửa để thêm khóa ngoại):
    ```php
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->string("slug");
            $table->double("price");
            $table->integer("quantity");
            $table->longText("firstImage");
            $table->longText("secondImage");
            $table->longText("thirdImage");
            $table->bigInteger("category_id")->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    ```

- **Áp dụng Migration**:
  ```bash
  docker-compose exec app php artisan migrate
  ```
  - **Giải thích**: Tạo bảng trong MySQL.
  - **Kết quả mong đợi**: Bảng `categories` và `products` được tạo.

#### Tạo và chạy Seeder
- **Câu lệnh**:
  ```bash
  docker-compose exec app php artisan make:seeder CategoriesTableSeeder
  docker-compose exec app php artisan make:seeder ProductsTableSeeder
  ```

- **Nội dung Seeder**:
  - `CategoriesTableSeeder.php`:
    ```php
    use App\Models\Category;

    class CategoriesTableSeeder extends Seeder
    {
        public function run()
        {
            Category::create(['name' => 'Electronics', 'slug' => 'electronics']);
            Category::create(['name' => 'Clothing', 'slug' => 'clothing']);
        }
    }
    ```
  - `ProductsTableSeeder.php`:
    ```php
    use App\Models\Product;

    class ProductsTableSeeder extends Seeder
    {
        public function run()
        {
            Product::create([
                'name' => 'Smartphone',
                'description' => 'A latest smartphone',
                'slug' => 'smartphone',
                'price' => 599.99,
                'quantity' => 10,
                'firstImage' => 'path/to/image1.jpg',
                'secondImage' => 'path/to/image2.jpg',
                'thirdImage' => 'path/to/image3.jpg',
                'category_id' => 1,
            ]);
            Product::create([
                'name' => 'T-Shirt',
                'description' => 'Comfortable cotton t-shirt',
                'slug' => 't-shirt',
                'price' => 19.99,
                'quantity' => 50,
                'firstImage' => 'path/to/image4.jpg',
                'secondImage' => 'path/to/image5.jpg',
                'thirdImage' => 'path/to/image6.jpg',
                'category_id' => 2,
            ]);
        }
    }
    ```

- **Cập nhật `DatabaseSeeder.php`**:
  ```php
  public function run()
  {
      $this->call([CategoriesTableSeeder::class, ProductsTableSeeder::class]);
  }
  ```

- **Chạy Seeder**:
  ```bash
  docker-compose exec app php artisan db:seed
  ```
  - **Giải thích**: Thêm dữ liệu mẫu vào bảng.
  - **Kết quả mong đợi**: Dữ liệu được chèn vào `categories` và `products`.

#### Hiển thị dữ liệu trên trình duyệt
- **Tạo Controller**:
  ```bash
  docker-compose exec app php artisan make:controller ProductController
  ```
  - **Nội dung `ProductController.php`**:
    ```php
    namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        public function index()
        {
            $products = Product::with('category')->get();
            return view('products.index', compact('products'));
        }
    }
    ```

- **Tạo View**:
  - Tạo file `resources/views/products/index.blade.php`:
    ```blade
    @foreach ($products as $product)
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>
        <p>Category: {{ $product->category->name }}</p>
    @endforeach
    ```

- **Thêm Route**:
  - Trong `routes/web.php`:
    ```php
    use App\Http\Controllers\ProductController;

    Route::get('/products', [ProductController::class, 'index']);
    ```

- **Truy cập**: Mở `http://localhost/products`.
  - **Giải thích**: Hiển thị danh sách sản phẩm.
  - **Kết quả mong đợi**: Trang web hiển thị dữ liệu từ cơ sở dữ liệu.

### 3.6. Kiểm tra và bảo trì
- **Kiểm tra trạng thái**:
  ```bash
  docker-compose ps
  ```
  - **Giải thích**: Xác nhận tất cả container chạy.

- **Dừng container**:
  ```bash
  docker-compose down
  ```
  - **Giải thích**: Dừng và xóa container (dùng `-v` để xóa volume nếu cần: `docker-compose down -v`).

## 4. Kết quả
- Ứng dụng Laravel chạy thành công tại `http://localhost`.
- Dữ liệu mẫu đã được thêm vào bảng `categories` và `products`.
- Giao diện `/products` hiển thị danh sách sản phẩm nếu route và view được thiết lập.

## 5. Lưu ý
- Nếu gặp lỗi, kiểm tra log:
  ```bash
  docker-compose logs app
  docker-compose logs mysql
  docker-compose logs nginx
  ```
- Đảm bảo `APP_URL` trong `.env` khớp với địa chỉ truy cập.
- Cập nhật đường dẫn ảnh (`firstImage`, `secondImage`, `thirdImage`) trong seeder nếu cần.
- Nếu sử dụng Vite hoặc Laravel Mix, sau `npm install`, chạy `npm run dev` hoặc `npm run build` trên máy chủ để biên dịch tài nguyên frontend.
```
