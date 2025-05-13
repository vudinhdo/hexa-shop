<?php

return [
    'accepted'             => ':attribute phải được chấp nhận.',
    'active_url'           => ':attribute không phải là một URL hợp lệ.',
    'after'                => ':attribute phải là một ngày sau :date.',
    'after_or_equal'       => ':attribute phải là một ngày sau hoặc bằng :date.',
    'alpha'                => ':attribute chỉ được chứa chữ cái.',
    'alpha_dash'           => ':attribute chỉ được chứa chữ cái, số, dấu gạch ngang và gạch dưới.',
    'alpha_num'            => ':attribute chỉ được chứa chữ cái và số.',
    'array'                => ':attribute phải là một mảng.',
    'before'               => ':attribute phải là một ngày trước :date.',
    'before_or_equal'      => ':attribute phải là một ngày trước hoặc bằng :date.',
    'between'              => [
        'numeric' => ':attribute phải nằm giữa :min và :max.',
        'file'    => ':attribute phải có kích thước từ :min đến :max kilobytes.',
        'string'  => ':attribute phải có độ dài từ :min đến :max ký tự.',
        'array'   => ':attribute phải có từ :min đến :max phần tử.',
    ],
    'boolean'              => ':attribute phải là đúng hoặc sai.',
    'confirmed'            => ':attribute xác nhận không khớp.',
    'date'                 => ':attribute không phải là một ngày hợp lệ.',
    'date_format'          => ':attribute không khớp với định dạng :format.',
    'different'            => ':attribute và :other phải khác nhau.',
    'digits'               => ':attribute phải là :digits chữ số.',
    'digits_between'       => ':attribute phải nằm giữa :min và :max chữ số.',
    'dimensions'           => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => ':attribute có giá trị trùng lặp.',
    'email'                => ':attribute phải là một địa chỉ email hợp lệ.',
    'exists'               => ':attribute không hợp lệ.',
    'file'                 => ':attribute phải là một tệp tin.',
    'filled'               => ':attribute phải có giá trị.',
    'gt'                   => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file'    => ':attribute phải có kích thước lớn hơn :value kilobytes.',
        'string'  => ':attribute phải có độ dài lớn hơn :value ký tự.',
        'array'   => ':attribute phải có nhiều hơn :value phần tử.',
    ],
    'gte'                  => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file'    => ':attribute phải có kích thước lớn hơn hoặc bằng :value kilobytes.',
        'string'  => ':attribute phải có độ dài lớn hơn hoặc bằng :value ký tự.',
        'array'   => ':attribute phải có :value phần tử hoặc nhiều hơn.',
    ],
    'image'                => ':attribute phải là một hình ảnh.',
    'in'                   => ':attribute không hợp lệ.',
    'in_array'             => ':attribute không tồn tại trong :other.',
    'integer'              => ':attribute phải là một số nguyên.',
    'ip'                   => ':attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4'                 => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6'                 => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json'                 => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lt'                   => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file'    => ':attribute phải có kích thước nhỏ hơn :value kilobytes.',
        'string'  => ':attribute phải có độ dài nhỏ hơn :value ký tự.',
        'array'   => ':attribute phải có ít hơn :value phần tử.',
    ],
    'lte'                  => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file'    => ':attribute phải có kích thước nhỏ hơn hoặc bằng :value kilobytes.',
        'string'  => ':attribute phải có độ dài nhỏ hơn hoặc bằng :value ký tự.',
        'array'   => ':attribute không được có nhiều hơn :value phần tử.',
    ],
    'max'                  => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file'    => ':attribute không được lớn hơn :max kilobytes.',
        'string'  => ':attribute không được dài hơn :max ký tự.',
        'array'   => ':attribute không được có nhiều hơn :max phần tử.',
    ],
    'mimes'                => ':attribute phải là một tệp tin loại: :values.',
    'mimetypes'            => ':attribute phải là một tệp tin loại: :values.',
    'min'                  => [
        'numeric' => ':attribute phải ít nhất là :min.',
        'file'    => ':attribute phải có kích thước ít nhất :min kilobytes.',
        'string'  => ':attribute phải có độ dài ít nhất :min ký tự.',
        'array'   => ':attribute phải có ít nhất :min phần tử.',
    ],
    'not_in'               => ':attribute không hợp lệ.',
    'not_regex'            => ':attribute có định dạng không hợp lệ.',
    'numeric'              => ':attribute phải là một số.',
    'password'             => 'Mật khẩu không chính xác.',
    'present'              => ':attribute phải có mặt.',
    'regex'                => ':attribute có định dạng không hợp lệ.',
    'required'             => ':attribute là bắt buộc.',
    'required_if'          => ':attribute là bắt buộc khi :other là :value.',
    'required_unless'      => ':attribute là bắt buộc trừ khi :other nằm trong :values.',
    'required_with'        => ':attribute là bắt buộc khi :values có mặt.',
    'required_with_all'    => ':attribute là bắt buộc khi :values có mặt.',
    'required_without'     => ':attribute là bắt buộc khi :values không có mặt.',
    'required_without_all' => ':attribute là bắt buộc khi không có bất kỳ :values nào có mặt.',
    'same'                 => ':attribute và :other phải khớp nhau.',
    'size'                 => [
        'numeric' => ':attribute phải có kích thước :size.',
        'file'    => ':attribute phải có kích thước :size kilobytes.',
        'string'  => ':attribute phải có độ dài :size ký tự.',
        'array'   => ':attribute phải chứa :size phần tử.',
    ],
    'starts_with'          => ':attribute phải bắt đầu bằng một trong những giá trị sau: :values',
    'string'               => ':attribute phải là một chuỗi.',
    'timezone'             => ':attribute phải là một múi giờ hợp lệ.',
    'unique'               => ':attribute đã được sử dụng.',
    'uploaded'             => ':attribute tải lên thất bại.',
    'url'                  => ':attribute có định dạng không hợp lệ.',
    'uuid'                 => ':attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'tên',
        'full_name' => 'họ và tên',
        'email' => 'địa chỉ email',
        'phone' => 'số điện thoại',
        'password' => 'mật khẩu',
        'address' => 'địa chỉ',
    ],
];
