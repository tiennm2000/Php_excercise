<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: inline-block;
            width: 80px;
        }
        .form-group input,
         {
            width: 150px;
        }
        button {
            width: auto;
        }
    </style>
</head>
<body>
    <?php
        $operators = ["+","-","*","/"];
        if(isset($_GET["first"]) && isset($_GET['second'])){
            $firstNumber = $_GET['first'];
            $secondNumber = $_GET['second'];
            $operator = $_GET['operator'];
            
            if($operator === '/'){
                if($secondNumber === '0'){
                    throw new Exception('Division by zero error!');
                }
            }
            $expression = "$firstNumber $operator $secondNumber";
            $result= eval("return $expression;");
        } 
    ?>
    <form action="">
        <div class="form-group">
            <label for="first">First:</label>
            <input type="number" name='first' value="<?=$firstNumber ?>"/>
        </div>
        <div class="form-group">
            <label for="second">Second:</label>
            <input type="number" name='second' value="<?=$secondNumber ?>"/>
        </div>
        <div class="form-group">
            <label for="operator">Operator:</label>
            <select name="operator">
                <?php foreach ($operators as $operator) : ?>
                    <option value= "<?= $operator ?>"> <?=$operator?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="submit">Compute:</label>
            <input type="submit" value="Compute">
        </div>
        <div class="form-group">
            <label for="result">Result:</label>
            <input type="number" value="<?=$result ?>" disabled>
        </div>
    </form>
</body>
</html>
