<?

if(isset($_POST['name'])){
    if($_POST['name'] != '') {
        if(mysqli_query($connection, "
                UPDATE 
                    students 
                SET 
                    name = '{$_POST['name']}', 
                    group_id = {$_POST['group']} 
                WHERE 
                id={$_GET['id']}
            ")){
            $msg = 'Update succes';
            $msgClass = 'success';
        } else {
            $msg = 'Update ERROR';
            $msgClass = 'danger';
        }
    } else {
        $msg = 'Error. Name can not be empty';
        $msgClass = 'danger';
    }
}

$result = mysqli_query($connection, "SELECT id, name, group_id FROM students WHERE id={$_GET['id']}");
if($result){
    $student = mysqli_fetch_assoc($result);
}

$resultGroups = mysqli_query($connection, "SELECT id, name FROM `groups`");

?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="?module=students&action=read">Students</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update</li>
    </ol>
  </nav>
</div>

<div class="row">
  <form action="" method="post">
    <div class="alert alert-<?=$msgClass;?>" role="alert">
        <?=$msg;?>
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" value="<?=$student['name'];?>" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="emailHelp" class="form-text text-muted">Student name.</small>
    </div>

    <div class="form-group">
      <label for="group">Group</label>
      <select class="form-control" id="group" name="group">
        <option value="0">Select group</option>
          <? while($group = mysqli_fetch_assoc($resultGroups)){?>
            <option value="<?=$group['id'];?>"  <?=$group['id'] == $student['group_id']?'selected':'';?>><?=$group['name'];?></option>
          <? }?>
      </select>
      <small id="emailHelp" class="form-text text-muted">Group name.</small>
    </div>
    <input type="submit" class="btn btn-primary" value="save">
  </form>
</div>


