<?php
    include "header.php";

    $profilePic = "";

    if(isset($_FILES["image"]) && !empty($_FILES["image"]))
    {   
        $fileName = $_FILES["image"]["name"];
        $destination = "./img/".$fileName;
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $destination))
        {
            $profilePic = $destination;
            echo "sucess";
        } else
        {
            echo "Uploading error";
        }
    }
?>

<img id="uploadedImage" src="<?php echo $imagePath; ?>" style="max-width: 300px; max-height: 300px;">

<div class="row">
    <div class="col-md-4">
        <form action="home.php" method="post" enctype="multipart/form-data">
            <label>Select image</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="profilePic"/>
            <button type="submit" name="submit" class ="btn btn-success">
                Upload image</button>
        </form>
    </div>
</div>

<?php

include "footer.php";

?>