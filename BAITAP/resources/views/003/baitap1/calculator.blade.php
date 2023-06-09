<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <style>
        .calculator {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
            max-width: 300px;
            margin: 0 auto;
            padding: 10px;
        }

        .calculator input {
            grid-column: span 4;
            padding: 10px;
            font-size: 18px;
        }

        .calculator button {
            padding: 10px;
            font-size: 18px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form method="post" action="{{ route('calculator.calculate') }}">
            @csrf
            <input type="text" name="expression" id="expression" value="{{ old('expression') }}">
            <button type="button" onclick="addToExpression('1')">1</button>
            <button type="button" onclick="addToExpression('2')">2</button>
            <button type="button" onclick="addToExpression('3')">3</button>
            <button type="button" onclick="addToExpression('4')">4</button>
            <button type="button" onclick="addToExpression('5')">5</button>
            <button type="button" onclick="addToExpression('6')">6</button>
            <button type="button" onclick="addToExpression('7')">7</button>
            <button type="button" onclick="addToExpression('8')">8</button>
            <button type="button" onclick="addToExpression('9')">9</button>
            <button type="button" onclick="addToExpression('0')">0</button>
            <button type="button" onclick="addToExpression('+')">+</button>
            <button type="button" onclick="addToExpression('-')">-</button>
            <button type="button" onclick="addToExpression('*')">*</button>
            <button type="button" onclick="addToExpression('.')">.</button>
            <button type="button" onclick="addToExpression('/')">/</button>
            <button type="button" onclick="clearExpression()">C</button>
            <button type="submit">=</button>
        </form>
    </div>

    @if (session('result'))
        <p>Result: {{ session('result') }}</p>
    @endif

    <script>
        function addToExpression(value) {
            document.getElementById('expression').value += value;
        }

        function clearExpression() {
            document.getElementById('expression').value = '';
        }
    </script>
</body>
</html>
