<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SISTEM PENJUALAN</title>
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
            select {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        color: #333;
        background-color: #fff;
        appearance: none; 
        cursor: pointer;
    }

    select:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
    }

    option {
        font-size: 14px;
        color: #333;
        padding: 5px;
    }

    option:checked {
        background-color: #007bff;
        color: white;
    }
        </style>
    </head>
    <body>
        
        
<form action="" method="post">
    <input type="hidden" name="id" value="<?= isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';?>">
    <table>
    <tr>
        <td><label for="username">Username</label></td>
        <td><input type="text" name="username" id="username" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';?>"></td>
    </tr>
    <tr>
        <td><label for="password">Password</label></td>
        <td><input type="text" name="password" id="password" value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';?>"></td>
    </tr>
    <tr>
        <td><label for="nama">Nama</label></td>
        <td><input type="text" name="nama" id="nama" value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';?>"></td>
    </tr>
    <tr>
        <td><label for="alamat">Alamat</label></td>
        <td><textarea name="alamat" id="alamat"><?= isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : '';?></textarea></td>
    </tr>
    <tr>
        <td><label for="hp">Nomor HP</label></td>
        <td><input type="text" name="hp" id="hp" value="<?= isset($_POST['hp']) ? htmlspecialchars($_POST['hp']) : '';?>"></td>
    </tr>
    <tr>
        <td><label for="level">Jenis User</label></td>
        <td><select name="level" id="level">
        <option value="">--- Pilih Jenis User ---</option>
        <option value="1" <?= isset($_POST['level']) && $_POST['level'] == 1 ? 'selected' : ''; ?>>Owner</option>
        <option value="2" <?= isset($_POST['level']) && $_POST['level'] == 2 ? 'selected' : ''; ?>>Kasir</option>
    </select></td>
    </tr>
    </table>
    <button type="submit" name="simpan">Simpan</button>
    <button type="submit" name="batal">Batal</button>
</form>
</body>
</html>