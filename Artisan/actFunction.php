<?php

/********************************** Act Function **********************************/
{
    function makeController()
    {
        foreach (getControllerTemplateRoute() as $from => $to) {
            $arg = [
                'from' => $from,
                'to' => $to,
            ];
            
            writeIn($arg);
        }
    }

    function makeService()
    {
        foreach (getServiceTemplateRoute() as $from => $to) {
            $arg = [
                    'from' => $from,
                    'to' => $to,
                ];
                
            writeIn($arg);
        }
    }

    function makeRepository($models)
    {
        global $b_camel_name;

        foreach (getRepositoryTemplateRoute() as $from => $to) {
            $arg = [
                    'from' => $from,
                    'to' => $to,
                    'models' => $models
                ];
                
            writeIn($arg);
        }
    }
    
    function makeModel($modelName)
    {
        global $b_camel_name;

        $modelTemplate = getModelTemplateRoute($modelName);

        mkdirFunction($modelTemplate['baseRoute'] . $b_camel_name);

        foreach ($modelTemplate['routeMap'] as $from => $to) {
            $arg = [
                'from' => $from,
                'to' => $to,
                'b_model_name' => $modelName,
                's_model_name' => lcfirst($modelName),
                'snake_model_name' => decamelize(lcfirst($modelName)),
            ];
            
            writeIn($arg);
        }
    }
}
