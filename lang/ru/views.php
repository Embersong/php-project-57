<?php

return [
    'home' => [
        'header' => 'Привет от Хекслета!',
        'description' => 'Это простой менеджер задач на Laravel',
        'learn_more' => 'Нажми меня'
    ],
    'task_status' => [
        'index' => [
            'header' => 'Статусы',
            'id' => 'ID',
            'name' => 'Имя',
            'created_at' => 'Дата создания',
            'actions' => 'Действия',
            'delete_confirmation' => 'Вы уверены?',
            'delete' => 'Удалить',
            'edit' => 'Изменить',
            'create_button' => 'Создать статус'
        ],
        'edit' => [
            'form_header' => 'Изменение статуса',
            'labels' => [
                'name' => 'Имя'
            ],
            'buttons' => [
                'update' => 'Обновить'
            ]
        ],
        'create' => [
            'form_header' => 'Создать статус',
            'labels' => [
                'name' => 'Имя'
            ],
            'buttons' => [
                'create' => 'Создать'
            ]
        ]
    ],
    'task' => [
        'index' => [
            'header' => 'Задачи',
            'id' => 'ID',
            'name' => 'Имя',
            'created_at' => 'Дата создания',
            'actions' => 'Действия',
            'delete_confirmation' => 'Вы уверены?',
            'delete' => 'Удалить',
            'edit' => 'Изменить',
            'create_button' => 'Создать задачу',
            'status' => 'Статус',
            'creator' => 'Автор',
            'assigned_to' => 'Исполнитель',
            'placeholders' => [
                'status_id' => 'Статус',
                'created_by_id' => 'Автор',
                'assigned_to_id' => 'Исполнитель'
            ],
            'filter_button' => 'Применить'
        ],
        'edit' => [
            'form_header' => 'Изменение задачи',
            'labels' => [
                'name' => 'Имя',
                'description' => 'Описание',
                'status_id' => 'Статус',
                'assigned_to_id' => 'Исполнитель',
                'labels' => 'Метки'
            ],
            'buttons' => [
                'update' => 'Обновить'
            ]
        ],
        'create' => [
            'form_header' => 'Создать задачу',
            'labels' => [
                'name' => 'Имя',
                'description' => 'Описание',
                'status_id' => 'Статус',
                'assigned_to_id' => 'Исполнитель',
                'labels' => 'Метки'
            ],
            'buttons' => [
                'create' => 'Создать'
            ]
        ],
        'show' => [
            'header' => 'Просмотр задачи: :name',
            'name' => 'Имя',
            'description' => 'Описание',
            'status_id' => 'Статус',
            'labels' => 'Метки'
        ]
    ],
    'label' => [
        'index' => [
            'header' => 'Метки',
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'created_at' => 'Дата создания',
            'actions' => 'Действия',
            'delete_confirmation' => 'Вы уверены?',
            'delete' => 'Удалить',
            'edit' => 'Изменить',
            'create_button' => 'Создать метку'
        ],
        'edit' => [
            'form_header' => 'Изменение метки',
            'labels' => [
                'name' => 'Имя',
                'description' => 'Описание'
            ],
            'buttons' => [
                'update' => 'Обновить'
            ]
        ],
        'create' => [
            'form_header' => 'Создать метку',
            'labels' => [
                'name' => 'Имя',
                'description' => 'Описание'
            ],
            'buttons' => [
                'create' => 'Создать'
            ]
        ]
    ],
    'auth' => [
        'name' => 'Имя',
        'email' => 'Email',
        'password' => 'Пароль',
        'confirm_password' => 'Подтверждение',
        'already_registered' => 'Уже зарегистрированы?',
        'register_button' => 'Зарегистрировать',
        'remember_me' => 'Запомнить меня',
        'log_in' => 'Войти',
        'forgot_your_password' => 'Забыли пароль?',
        'email_password_reset_link' => 'Сбросить пароль'
    ]
];
