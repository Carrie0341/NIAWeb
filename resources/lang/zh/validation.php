<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute 必須被接受',
    'active_url' => ':attribute 不是一個有效的 URL',
    'after' => ':attribute 必須是 :date 之後的日期',
    'after_or_equal' => ':attribute 必須是 :date 或是之後的日期',
    'alpha' => ':attribute 只允許包含字母',
    'alpha_dash' => ':attribute 只允許包含字母、數字、破折號以及下劃線',
    'alpha_num' => ':attribute 只允許包含數字',
    'array' => ':attribute 必須是個陣列',
    'before' => ':attribute 必須是 :date 之前的日期',
    'before_or_equal' => ':attribute 必須是 :date 或是之前的日期',
    'between' => [
        'numeric' => ':attribute 必須在 :min 和 :max之間',
        'file' => ':attribute 必須在 :min 和 :max kb.',
        'string' => ':attribute 只允許擁有 :min 和 :max 字符',
        'array' => ':attribute 只允許擁有 :min 與 :max 個元素',
    ],
    'boolean' => ':attribute 欄位必須是 true 或 false.',
    'confirmed' => ':attribute 不符合確認欄位',
    'date' => ':attribute 是個無效的日期',
    'date_equals' => ':attribute 必須是 :date.',
    'date_format' => ':attribute 不符合格式 :format.',
    'different' => ':attribute 與 :other 必須不同',
    'digits' => ':attribute 必須是 :digits 位數',
    'digits_between' => ':attribute 只允許介於 :min 至 :max 位數',
    'dimensions' => ':attribute 包含無效的圖片尺寸',
    'distinct' => ':attribute 欄位具有重複值',
    'email' => ':attribute 必須是正確的信箱格式',
    'exists' => '被選擇的 :attribute 無效',
    'file' => ':attribute 必須是個檔案',
    'filled' => ':attribute 不允許空值',
    'gt' => [
        'numeric' => ':attribute 必須大於 :value.',
        'file' => ':attribute 檔案大小必須大於 :value kilobytes.',
        'string' => ':attribute 必須大於 :value 個字符',
        'array' => ':attribute 必須多於 :value 個元素',
    ],
    'gte' => [
        'numeric' => ':attribute 必須大於或等於 :value.',
        'file' => ':attribute 檔案大小必須大於或等於 :value kilobytes.',
        'string' => ':attribute 必須大於或等於 :value 個字符',
        'array' => ':attribute 必須多於或等於 :value 個元素',
    ],
    'image' => ':attribute 必須是圖片',
    'in' => '被選擇的 :attribute 無效',
    'in_array' => ':attribute 欄位不存在於 :other.',
    'integer' => ':attribute 必須是數字',
    'ip' => ':attribute 必須是合法的IP位址',
    'ipv4' => ':attribute 必須是合法的 IPv4 位址',
    'ipv6' => ':attribute 必須是合法的 IPv6 位址',
    'json' => ':attribute 必須是合法的 JSON 字串',
    'lt' => [
        'numeric' => ':attribute 必須小於或等於 :value.',
        'file' => ':attribute 檔案大小必須小於或等於 :value kilobytes.',
        'string' => ':attribute 必須小於或等於 :value 個字符',
        'array' => ':attribute 必須小於或等於 :value 個元素',
    ],
    'lte' => [
        'numeric' => ':attribute 必須小於 :value.',
        'file' => ':attribute 檔案大小必須小於 :value kilobytes.',
        'string' => ':attribute 必須小於 :value 個字符',
        'array' => ':attribute 必須小於 :value 個元素',
    ],
    'max' => [
        'numeric' => ':attribute 也許不大於 :max.',
        'file' => ':attribute may not be greater than :max kilobytes.',
        'string' => ':attribute may not be greater than :max characters.',
        'array' => ':attribute may not have more than :max items.',
    ],
    'mimes' => ':attribute must be a file of type: :values.',
    'mimetypes' => ':attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute must be at least :min.',
        'file' => ':attribute must be at least :min kilobytes.',
        'string' => ':attribute must be at least :min characters.',
        'array' => ':attribute must have at least :min items.',
    ],
    'not_in' => 'selected :attribute is invalid.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute must be a number.',
    'present' => ':attribute field must be present.',
    'regex' => ':attribute format is invalid.',
    'required' => ':attribute field is required.',
    'required_if' => ':attribute field is required when :other is :value.',
    'required_unless' => ':attribute field is required unless :other is in :values.',
    'required_with' => ':attribute field is required when :values is present.',
    'required_with_all' => ':attribute field is required when :values are present.',
    'required_without' => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same' => ':attribute and :other must match.',
    'size' => [
        'numeric' => ':attribute must be :size.',
        'file' => ':attribute must be :size kilobytes.',
        'string' => ':attribute must be :size characters.',
        'array' => ':attribute must contain :size items.',
    ],
    'starts_with' => ':attribute must start with one of following: :values',
    'string' => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid zone.',
    'unique' => ':attribute has already been taken.',
    'uploaded' => ':attribute failed to upload.',
    'url' => ':attribute format is invalid.',
    'uuid' => ':attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
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
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
