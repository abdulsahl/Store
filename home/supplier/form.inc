<html>
    <head>
        <style>
            form {
                background-color: #fff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-width: 300px;
                margin: 0 auto;
                margin-top: 20px;
                font-family: Arial, sans-serif;
            }

            h2 {
                text-align: center;
                color: #333;
                font-size: 24px;
                margin-bottom: 20px;
            }

            
            label {
                font-size: 14px;
                font-weight: bold;
                color: #333;
                margin-bottom: 8px;
                display: inline-block;
            }

            
            input[type="text"], input[type="email"], input[type="tel"], textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                margin-bottom: 20px;
                font-size: 14px;
                color: #333;
            }

            input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, textarea:focus {
                border-color: #007bff;
                outline: none;
            }

            
            button {
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 100px;
                margin-top: 10px;
            }

            button:hover {
                background-color: #0056b3;
            }

            
            .error {
                color: red;
                font-size: 14px;
                margin-bottom: 15px;
            }

            
            .form-actions {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }

            .form-actions button {
                width: 48%;
            }
        </style>
    </head>
    <body>
        
<form action="" method="post">
        <table>
        <input type="hidden" name="id" value="<?php echo isset($_POST['id']) ? htmlspecialchars($_POST['id']) : ''; ?>">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" placeholder="Nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>"></td>
            </tr>
            <tr>
                <td><label for="telp">Telp</label></td>
                <td><input type="text" id="telp" name="telp" placeholder="telp" value="<?php echo isset($_POST['telp']) ? htmlspecialchars($_POST['telp']) : ''; ?>"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" id="alamat" name="alamat" placeholder="alamat" value="<?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?>"></td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
        <button type="submit" name="batal">Batal</button>
    </form>
    </body>
</html>