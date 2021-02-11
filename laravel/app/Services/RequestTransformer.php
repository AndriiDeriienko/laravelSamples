<?php

namespace App\Services;

use Illuminate\Http\Request;

class RequestTransformer
{
    /**
     * @param Request $request
     * @param array $rules
     */
    public static function transform(Request $request, array $rules): void
    {
        foreach ($rules as $property => $rule) {
            if (!$request->has($property) || !is_callable($rule)) {
                continue;
            }

            $value = $request->input($property);
            $result = call_user_func($rule, $value);
            $request->request->set($property, $result);
        }
    }
}
