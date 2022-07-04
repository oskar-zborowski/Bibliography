<?php
/** Admiko global search configuration**/



/**IMPORTANT: this page will be overwritten and any change will be lost!!
 ** use admiko_global_search_custom.php to add your models into global search!!
 **/
return [
    [
        'name' => 'Bibliografia',
        'route_id' => 'bibliography',
        'model' => 'Bibliography',
        'fields' => [
            ["field"=>"id","show"=>1],
			["field"=>"authors","show"=>1],
			["field"=>"title","show"=>1],
			["field"=>"issue_title","show"=>1],
			["field"=>"volume_editor","show"=>1],
			["field"=>"volume","show"=>1],
			["field"=>"notebook","show"=>1],
			["field"=>"series","show"=>1],
			["field"=>"publication_place","show"=>1],
			["field"=>"publishing_house","show"=>1],
			["field"=>"publishment_year","show"=>1],
			["field"=>"publication_year","show"=>1],
			["field"=>"page_range","show"=>1],
			["field"=>"illustrations_number","show"=>1],
			["field"=>"keywords","show"=>1],
			["field"=>"isbn","show"=>1],
			["field"=>"issn","show"=>1],
			["field"=>"doi","show"=>1],
			["field"=>"link","show"=>1]
        ]
    ],
];
