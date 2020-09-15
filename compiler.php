<?php
 putenv("PATH=C:\Program Files\CodeBlocks\MinGW\bin");
$CC="gcc";
$out="a.exe";
$code=$_REQUEST["code"];
$input=$_REQUEST["input"];
$filename_code="main.c";
$filename_in="input.txt";
$filename_error="error.txt";
$executable="a.exe";
$command=$CC." -lm ".$filename_code;	
$command_error=$command." 2>".$filename_error;

    exec("sudo -i");	

$file_code=fopen($filename_code,"w+");
fwrite($file_code,$code);
fclose($file_code);
$file_in=fopen($filename_in,"w+");
fwrite($file_in,$input);
fclose($file_in);
exec("chmod 777 $executable");
exec("chmod 777 $filename_error");

shell_exec($command_error);
$error=file_get_contents($filename_error);
    $test=shell_exec("cat a1.txt");
if(trim($error)=="")
{
if(trim($input)=="")
{
$output=shell_exec($out);
}
else
{
$out=$out." < ".$filename_in;
$output=shell_exec($out);
}
echo "<pre>$output</pre>";

}
else if(!strpos($error,"error"))
{
echo "<pre>$error</pre>";
if(trim($input)=="")
{
$output=shell_exec($out);
}
else
{
$out=$out." < ".$filname_in;
$output=shell_exec($out);
}
echo "<pre>$output</pre>";
}
else
{
echo "<pre>$error</pre>";
}
exec("rm $filename_code");
exec("rm *.o");
exec("rm *[!0-9].txt");
exec("rm $executable");
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style-com.css">
  <link rel="icon" type="image/ico" href="b.png" />
  <title>Bugger compiler</title>
  <meta name="keywords" content="Online,Compiler" />
  <link rel="shortcut icon" href="../styles/favicon.ico" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Custom Theme files -->
  <link href="registration/signup.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->
  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
  <!-- //web font -->
</head>
<style>
*{
    box-sizing:border-box;
}
textarea {
overflow: scroll;
margin: auto;
background: #f4f4f9;
outline:2px;
    font-family: Courier, sans-serif;
    font-size: 20px;
}
#whol
{
    background-color:#424242;
}
body
{
color:;
}
.header {
padding: 10px 16px;
background: #555;
color: #f1f1f1;
}
.content {
padding: 16px;
}
.sticky {
position: fixed;
top: 0;
width: 100%
}
.sticky + .content {
    padding-top: 102px;
}
.content {
padding: 16px;
}
#xyz
{
    text-align:center;
}
</style>
<body>
<div class="content">
  <!-- notification message -->
      <div class="error success" >
      <h3>
      </h3>
      </div>
      <div class="main-w3layouts wrappre">
        <div>
      <div id="xyz"></div>
      <div id="content" id="xyz">
      <table class="code">
      <td class="code">
      <form action="compiler.php" method="post" id="form">
      <textarea name="code" id="code" rows=25 cols=100 placeholder="You can code in c and java as of now . Python is still not working ." onkeydown=insertTab(this,event) id="code"></textarea><br/>
      <span id="errorCode" class="error"></span><br/><br/>
      <strong>Sample Input please:<br/></strong>
      <textarea name="input" id="input" rows=7 cols=100 placeholder="Enter your input . Each input in different line ." id="input"></textarea><br/><br/>
      <input type="submit" value="Run" id="submit">
      <input type="reset" value="Reset"><br/>
	  <?php
echo "<pre>$output</pre>";
?>
      </form>
      </td>
      </div>
      </div>
    </div>
    <div class="colorlibcopy-agile">
</div>
<!-- //copyright -->

</div>
</div>

</body>
</html>

