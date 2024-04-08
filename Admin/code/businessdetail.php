<?php 
    include('../common_functions/function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/interface.css"></link>
    <title>Document</title>
</head>
<body>
    <header>Mn Business</header>
    <div>
        <form action='' method='GET'>
            <input type=text name='sdata'  value="<?php  if(isset($_POST['sdata'])) echo $_POST['sdata'];?>">
            <button name='sub'>search</button>
        </form>
    </div>
    <!-- <div><?php  getcatg(); ?></div> -->
    <div><?php  getbusiness(); ?></div>
</body>
</html>