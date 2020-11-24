<?php
$dbcon = new MySQLi("localhost","root","","jmspublicschool");
if(isset($_POST['add_main_menu']))
{
 $class = $_POST['class'];

 $sql=$dbcon->query("INSERT INTO `class`(`class_name`) VALUES ('$class')");
}
if(isset($_POST['add_sub_menu']))
{
 $parent = $_POST['parent'];
 $subject = $_POST['subject'];
 
 $sql=$dbcon->query("INSERT INTO `subject`(`class_id`, `subject`) VALUES ('$parent','$subject')");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dynamic Dropdown Menu using PHP and MySQLi</title>
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
<body>
<div id="head">
<div class="wrap"><br />
<h1><a href=""></a></h1>
</div>
</div>
<center>
<pre>
<form method="post">
<input type="text" placeholder="Class" name="class" /><br />
<button type="submit" name="add_main_menu">Add Class</button>
</form>
</pre>
<br />
<pre>
<form method="post">
<select name="parent">
<option selected="selected">select parent Class</option>
<?php
$res=$dbcon->query("SELECT * FROM class");
while($row=$res->fetch_array())
{
 ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['class_name']; ?></option>
    <?php
}
?>
</select><br />
<input type="text" placeholder="Class_name :" name="subject" /><br />
<button type="submit" name="add_sub_menu">Add sub menu</button>
</form>
</pre>
<a href="index.php">back to main page</a>
</center>
</body>
</html>