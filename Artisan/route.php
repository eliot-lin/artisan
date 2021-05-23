<?php

/********************************** Route Function **********************************/
{
    function mkdirFunction($dirRoute)
    {
        if (!is_dir($dirRoute)) {
            mkdir($dirRoute);
        }
    }

    function getControllerTemplateRoute()
    {
        global $b_camel_name;

        return [
            'Template/ControllerTemplate.php' => "../Controller/{$b_camel_name}Controller.php",
        ];
    }

    function getServiceTemplateRoute()
    {
        global $b_camel_name;

        return [
            'Template/ServiceTemplate.php' => "../Service/{$b_camel_name}Service.php",
        ];
    }
    
    function getRepositoryTemplateRoute()
    {
        global $b_camel_name;

        return [
            'Template/RepositoryTemplate.php' => "../Repository/{$b_camel_name}Repository.php",
        ];
    }
    
    function getModelTemplateRoute($modelName)
    {
        global $b_camel_name;

        return [
            'baseRoute' => "../model/",
            'routeMap' => [
                'Template/ModelTemplate.php' => "../Model/{$b_camel_name}/{$modelName}.php",
            ]
        ];
    }
}
