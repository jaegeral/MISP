<?php
echo $this->element('genericElements/Form/genericForm', [
    'data' => [
        'title' => isset($edit) ? __('Edit auth key') : __('Add auth key'),
        'description' => __('Auth keys are used for API access. A user can have more than one authkey, so if you would like to use separate keys per tool that queries MISP, add additional keys. Use the comment field to make identifying your keys easier.'),
        'fields' => [
            [
                'field' => 'user_id',
                'label' => __('User'),
                'options' => $dropdownData['user'],
                'type' => 'dropdown',
                'class' => 'span6'
            ],
            [
                'field' => 'comment',
                'label' => __('Comment'),
                'class' => 'span6',
                'rows' => 4,
            ],
            [
                'field' => 'allowed_ips',
                'label' => __('Allowed IPs'),
                'class' => 'span6',
                'rows' => 4,
            ],
            [
                'field' => 'expiration',
                'label' => __('Expiration (%s)', $validity ? __('keep empty for maximal validity of %s days', $validity) : __('keep empty for indefinite')),
                'class' => 'datepicker span6',
                'placeholder' => "YYYY-MM-DD",
                'type' => 'text'
            ],
            [
                'field' => 'read_only',
                'label' => __('Read only (it will unset all permissions. This should not be used for sync users)'),
                'type' => 'checkbox',
            ]
        ],
        'submit' => [
            'action' => $this->request->params['action'],
            'ajaxSubmit' => 'submitGenericFormInPlace();'
        ]
    ]
]);
if (!$ajax) {
    echo $this->element('/genericElements/SideMenu/side_menu', $menuData);
}
