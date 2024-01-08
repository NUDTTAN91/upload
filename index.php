<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>上传文件</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'JetBrains Mono';
            src: url('font/JetBrainsMono-Bold.ttf') format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        body {
            background: linear-gradient(90deg, #83a4d4, #b6fbff);
            font-family: 'JetBrains Mono', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 50%;
            min-width: 300px;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .copyright {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 15px 0;
            background-color: rgba(0, 0, 0, 0.6);
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mb-4">上传文件</h2>
    <form action="index.php" method="post" enctype="multipart/form-data" class="mb-4">
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload">
            <label class="custom-file-label" for="fileToUpload">选择文件</label>
        </div>
        <input class="btn btn-primary" type="submit" value="上传文件" name="submit">
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $target_dir = "uploads/"; // 文件保存目录
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // 检查文件类型是否是xxx
            if ($fileType !== "xxx") {
                echo "抱歉，只允许上传xxx文件.";
                $uploadOk = 0;
            }

            // 检查文件大小
            if ($_FILES["fileToUpload"]["size"] > 20 * 1024 * 1024) {
                echo "抱歉，你的文件过大.";
                $uploadOk = 0;
            }

            // 如果检查都没有问题，则尝试上传文件
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "文件 ". basename($_FILES["fileToUpload"]["name"]). " 已经被上传.";
                } else {
                    echo "上传文件时出错.";
                }
            }
        }
    ?>
</div>
<div class="copyright">
    &copy; 2023 <font size=5><b><a href="https://zxw-nudt.blog.csdn.net/" style="color: #fff;">tan91</a></b></font>. All rights reserved.
</div>
<script src="./js/jquery-3.5.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script>
    // 使选择的文件名显示在标签上
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
</body>
</html>
