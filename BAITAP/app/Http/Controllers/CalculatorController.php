<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('003.baitap1.calculator');
    }

    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'expression' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('calculator.index')->withErrors($validator)->withInput();
        }

        $expression = $request->input('expression');
        $result = $this->evalMathExpression($expression);

        return redirect()->route('calculator.index')->with('result', $result)->withInput();
    }

    private function evalMathExpression($expression)
    {
        $result = null;

        try {
            $result = eval("return $expression;");
        } catch (\Throwable $e) {
            // Xử lý lỗi hoặc ngoại lệ (nếu có)
        }

        return $result;
    }
}
