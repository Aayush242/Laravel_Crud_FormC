<?php

return[
    //Contact Relationship:
    'Contact' => 
    [
       'Account' => 
            [   
                'relation_with' => 'account',
                'relation_id' => 'Account_id',
                'check_relation' => 'contact_id',
                'relation' => 'Many_To_Many',
                'pivot' => 'account_contact',
            ],
    
       'Project' => 
            [   
                'relation_with' => 'projects',
                'relation_id' => 'Project_id',
                'check_relation' => 'contact_id',
                'relation' => 'Many_To_Many',
                'pivot' => 'contact_project',
            ],
    ],

    //Account Relationship:
    'Account' => 
    [   'Contact' => 
            [   
                'relation_with' => 'contacts',
                'relation_id' => 'Contact_id',
                'check_relation' => 'account_id',
                'relation' => 'Many_To_Many',
                'pivot' => 'account_contact',
            ],
    ],

    //Project Relationship:
    'Project' => 
    [   'Contact' =>   
            [
                'relation_with' => 'contacts',
                'relation_id' => 'Contact_id',
                'check_relation' => 'project_id',
                'relation' => 'Many_To_Many',
                'pivot' => 'contact_project',
            ]
    ],

];

