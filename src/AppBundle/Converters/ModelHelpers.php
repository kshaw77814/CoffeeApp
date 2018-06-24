<?php


namespace AppBundle\Converters;


trait ModelHelpers
{
    /**
     *  Convert to and from entities using view models that contain the getProperties method
     *
     * @param object $from The Entity/ViewModel to convert from
     * @param object $to The Entity/ViewModel to convert to
     * @return object Returns the converted Entity/Model
     */
    public function convertModel($from, $to)
    {
        if (method_exists($to, 'getProperties')) {
            foreach ($to->getProperties() as $prop => $value) {
                $getFunc = 'get' . ucwords($prop);
                $setFunc = 'set' . ucwords($prop);
                if (method_exists($from, $getFunc) && method_exists($to, $setFunc)) {
                    if (method_exists($to, $getFunc)) {
                        $to->$setFunc($from->$getFunc());
                    }
                }
            }
        } elseif (method_exists($from, 'getProperties')) {
            foreach ($from->getProperties() as $prop => $value) {
                $getFunc = 'get' . ucwords($prop);
                $setFunc = 'set' . ucwords($prop);
                if (method_exists($from, $getFunc) && method_exists($to, $setFunc)) {
                    if (method_exists($to, $getFunc)) {
                        $value = $from->$getFunc();
                        if (isset($value)) {
                            $to->$setFunc($from->$getFunc());
                        }
                    }
                }
            }
        }

        return $to;
    }

    /**
     * Map an array of values to an entity/view model
     *
     * @param array $from The array of data to map to the model
     * @param object $model The model to map the data to
     * @return object Returns the populated model
     */
    public function convertArrayToModel(array $from, $model)
    {
        if (method_exists($model, 'getProperties')) {
            foreach ($model->getProperties() as $prop => $value) {
                if (key_exists($prop, $from)) {
                    //Create the setter function name
                    $function = 'set' . ucwords($prop);
                    //assign the column value to the setter
                    if (method_exists($model, $function)) {
                            $model->$function($from[$prop]);
                    }
                }
            }
        }

        return $model;
    }
}