<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'لابد من الموافقه على :attribute .',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'لابد من تاكيد :attribute.',
    'date' => 'هذا الحقل يقبل تاريخ فقط.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ' صيغة التاريخ التى تم أدخالها غير متوافقه مع الصيغه المطلوبه:format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'لابد ان يحتوى هذا الحقل على :digits خانه.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'لابد من أدخال :attribute بشكل صحيح.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'هناك خطأ فى البيانات المدخله .',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'حذا الحقل لا يقبل الا صور فقط.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'لابد أن أدخال أرقام فقط فى حقل :attribute',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'لابد أن لايزيد عدد حروف هذا الحقل عن :max حرفا.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'لابد من التاكد من رفع ملف من النوع :values.',
    'mimetypes' => 'لابد من  رفع ملف من النوع: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'لابد عدد الحروف المدخله لا يقل عن  :min حرفا.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'مطلوب أدخال :attribute .',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'يتم أدخال نصوص فى هذا الحقل',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'لقد تم أضافة :attribute من قبل.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'لابد من أدخال رابط صحيح.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
        'website_logo' => 'لوجو الموقع',
        'website_name.ar' => 'أسم الموقع باللغه العربيه ',
        'website_name.en' => 'أسم الموقع باللغه الانجليزيه ',
        'mobile_number' => 'رقم الجوال',
        'email' => 'البريد الألكتروني',
        'currency_code.ar' => 'عملة الموقع باللغه العربيه ',
        'currency_code.en' => 'عملة الموقع باللغه الانجليزيه ',
        'tax' => 'القيمه الضريبيه',
        'shipping_price' => 'قيمة التوصيل',
        'about_services.ar' => 'نبذه عن خدماتنا باللغه العربيه ',
        'about_services.en' => 'نبذه عن خدماتنا باللغه الانجليزيه ',
        'about_offers.ar' => 'نبذه عن عروضنا باللغه العربيه ',
        'about_offers.en' => 'نبذه عن عروضنا باللغه الانجليزيه ',
        'privacy_policy.ar' => 'الشروط والأحكام باللغه العربيه ',
        'privacy_policy.en' => 'الشروط والأحكام باللغه الانجليزيه ',
        'privacy_policy.ar' => 'الشروط والأحكام باللغه العربيه ',
        'privacy_policy.en' => 'الشروط والأحكام باللغه الانجليزيه ',
        'about_us_description.ar' => 'من نحن باللغه العربيه ',
        'about_us_description.en' => 'من نحن باللغه الانجليزيه ',
        'our_vision.ar' => 'رؤيتنا  باللغه العربيه ',
        'our_vision.en' => 'رؤيتنا  باللغه الانجليزيه ',
        'our_message.ar' => 'رسالتنا  باللغه العربيه ',
        'our_message.en' => 'رسالتنا  باللغه الانجليزيه ',
        'our_goals.ar' => 'أهدافنا  باللغه العربيه ',
        'our_goals.en' => 'أهدافنا  باللغه الانجليزيه ',
        'about_us_image' => 'صوره تعبر عن من نحن',
        'copy_footer_text.ar' => 'نص حقوق الملكيه  باللغه العربيه ',
        'copy_footer_text.en' => 'نص حقوق الملكيه  باللغه الانجليزيه ',

        'facebook_url' => 'رابط صفحة الفيسبوك',
        'twitter_url' => 'رابط صفحة تويتر',
        'instagram_url' => 'رابط صفحة الانستجرام',
        'linkedin_url' => 'رابط لينكدان',
        'whatsapp_number' => 'رقم الواتساب',

        // Contact us
        'full_name' => 'الإسم',
        'message' => 'الرساله المراد أرسالها',
        'city' => 'المدينه',
        'state' => 'المحافظه',
        'full_address' => 'العنوان بالكامل',

        'name' => 'الأسم',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تاكيد كلمة المرور',
        'image' => 'صورة',
        'roles_name' => 'صلاحية الادمن',
        'status' => 'الحالة',

        'cover_image' => 'صورة غلاف للمقاله',
        'title.ar' => 'العنوان باللغه العربيه',
        'title.en' => 'العنوان باللغه الانجليزيه',
        'brief_about_blog.ar' => 'نبذه عن المقاله باللغه العربيه',
        'brief_about_blog.en' => 'نبذه عن المقاله باللغه الانجليزيه',
        'description.ar' => 'الوصف باللغه العربيه',
        'description.en' => 'الوصف باللغه الانجليزيه',
        'views_number' => 'عدد المشاهدات',

        'quantity' => 'لكميه',
        'comment' => 'التعليق',
        'rate' => 'التقييم',
        'order_number' => 'رقم الطلب',
        'payment_method' => 'طريقة الدفع',
        'total_price' => 'السعر الكلى',
        'user_id' => 'id االمستخدم',
        'user_address_id' => 'id عنوان المستخدم',
        'order_id' => 'رقم الاوردر',

        'partner_name' => 'أسم الشريك',
        'partner_image' => 'صورة الشريك',

        'product_name.ar' => 'أسم المنتج باللغه العربيه',
        'product_name.en' => 'أسم المنتج باللغه الانجليزيه',

        'product_model.ar' => 'موديل المنتج باللغه العربيه',
        'product_model.en' => 'موديل المنتج باللغه الانجليزيه',

        'product_details.ar' => 'نبذه عن المنتج باللغه العربيه',
        'product_details.en' => 'نبذه عن المنتج باللغه الانجليزيه',

        'product_description.ar' => 'وصف المنتج باللغه العربيه',
        'product_description.en' => 'وصف المنتج باللغه الانجليزيه',

        'rating' => 'التفييم',
        'product_price' => 'سعر المنتج',

        'product_image' => 'صور المنتج',
        'product_id' => 'id المنتج',


        'sup_title.ar' => 'العنوان الفرعى باللغه العربيه',
        'sup_title.en' => 'العنوان الفرعى باللغه الانجليزيه',

        'profile_image' => 'صورة البروفايل',

        'receive_notifications' => ' تلقي الاشعارات',

    ],

];