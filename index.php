<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navegação de Diretórios</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
            max-width: 800px;
            margin: 0 auto;
        }
        li {
            background-color: #fff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        li:hover {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        a:hover {
            text-decoration: underline;
        }
        .icon {
            font-size: 24px;
            margin-right: 15px;
        }
        .folder-icon {
            color: #f39c12;
        }
        .file-icon {
            color: #16a085;
        }
        .file-info {
            display: flex;
            align-items: center;
        }
        /* Estilos para o botão voltar */
        .back-btn {
            display: block;
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
        }
        .back-btn a {
            text-decoration: none;
            color: white;
            background-color: #e74c3c;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        .back-btn a:hover {
            background-color: #c0392b;
        }
        /* Estilo do formulário para criar uma nova pasta */
        .create-folder {
            margin: 20px auto;
            text-align: center;
        }
        .create-folder input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .create-folder button {
            padding: 10px 20px;
            margin-left: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .create-folder button:hover {
            background-color: #2980b9;
        }
        .remove-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
        }
        .remove-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h1>Explorador de Diretórios</h1>

    <!-- Formulário para criar nova pasta -->
    <div class="create-folder">
        <form action="" method="POST">
            <input type="text" name="new_folder" placeholder="Nome da nova pasta" required>
            <button type="submit" name="create_folder">Criar Pasta</button>
        </form>
    </div>

    <ul>
        <?php
        // Função para criar nova pasta
        if (isset($_POST['create_folder'])) {
            $new_folder = trim($_POST['new_folder']);
            $new_folder_path = __DIR__ . DIRECTORY_SEPARATOR . $new_folder;
            
            // Verificar se o nome da pasta já existe
            if (!file_exists($new_folder_path)) {
                mkdir($new_folder_path, 0777, true); // Cria a nova pasta

                // ---- NOVO: cria index.php com o conteúdo do explorador ----
                $explorer_code = <<<'EOL'
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navegação de Diretórios</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
            max-width: 800px;
            margin: 0 auto;
        }
        li {
            background-color: #fff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        li:hover {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        a:hover {
            text-decoration: underline;
        }
        .icon {
            font-size: 24px;
            margin-right: 15px;
        }
        .folder-icon {
            color: #f39c12;
        }
        .file-icon {
            color: #16a085;
        }
        .file-info {
            display: flex;
            align-items: center;
        }
        .back-btn {
            display: block;
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
        }
        .back-btn a {
            text-decoration: none;
            color: white;
            background-color: #e74c3c;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        .back-btn a:hover {
            background-color: #c0392b;
        }
        .create-folder {
            margin: 20px auto;
            text-align: center;
        }
        .create-folder input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .create-folder button {
            padding: 10px 20px;
            margin-left: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .create-folder button:hover {
            background-color: #2980b9;
        }
        .remove-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
        }
        .remove-btn:hover {
            background-color: #c0392b;
        }
        .copy-path-btn {
            background-color: #16a085;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-left: 10px;
            cursor: pointer;
            font-size: 0.95em;
        }
        .copy-path-btn:hover {
            background-color: #12806a;
        }
    </style>
</head>
<body>
    <h1>Explorador de Diretórios</h1>
    <!-- Botão de Voltar para o htdocs -->
    <div class="back-btn">
        <a href="http://localhost/">← Voltar para o htdocs</a>
    </div>
    <ul>
        <?php
        $dir = __DIR__;
        $base_url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/";
        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $entry)) {
                        $absolute_path = realpath($dir . DIRECTORY_SEPARATOR . $entry);
                        echo "<li>
                            <a href='$base_url$entry/' class='file-info'>
                                <span class='icon folder-icon'>&#128193;</span> $entry
                            </a>
                            <button type='button' class='copy-path-btn' data-path=\"$absolute_path\">Copiar Caminho</button>
                        </li>";
                    } else {
                        echo "<li>
                            <a href='$base_url$entry' class='file-info'>
                                <span class='icon file-icon'>&#128196;</span> $entry
                            </a>
                        </li>";
                    }
                }
            }
            closedir($handle);
        }
        ?>
    </ul>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.copy-path-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          const path = btn.getAttribute('data-path');
          navigator.clipboard.writeText(path).then(function() {
            btn.textContent = "Copiado!";
            setTimeout(() => btn.textContent = "Copiar Caminho", 1200);
          });
        });
      });
    });
    </script>
</body>
</html>
EOL;
                file_put_contents($new_folder_path . '/index.php', $explorer_code);

                echo "<p style='color: green; text-align: center;'>Pasta '$new_folder' criada com sucesso!</p>";
            } else {
                echo "<p style='color: red; text-align: center;'>Pasta '$new_folder' já existe!</p>";
            }
        }

        // Função para remover pasta
        function deleteDirectory($dir) {
            if (!is_dir($dir)) {
                return;
            }
            $files = array_diff(scandir($dir), ['.', '..']);
            foreach ($files as $file) {
                $path = $dir . DIRECTORY_SEPARATOR . $file;
                if (is_dir($path)) {
                    deleteDirectory($path);
                } else {
                    unlink($path); // Remove arquivo
                }
            }
            rmdir($dir); // Remove pasta
        }

        // Se o botão de remover pasta foi pressionado
        if (isset($_POST['remove_folder'])) {
            $folder_to_remove = $_POST['folder_name'];
            $folder_path = __DIR__ . DIRECTORY_SEPARATOR . $folder_to_remove;
            if (is_dir($folder_path)) {
                deleteDirectory($folder_path); // Remove a pasta e seus conteúdos
                echo "<p style='color: green; text-align: center;'>Pasta '$folder_to_remove' removida com sucesso!</p>";
            } else {
                echo "<p style='color: red; text-align: center;'>Pasta '$folder_to_remove' não encontrada!</p>";
            }
        }

        // Caminho do diretório atual
        $dir = __DIR__;
        $base_url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/";

        // Abrir o diretório
        if ($handle = opendir($dir)) {
            // Ler os arquivos e pastas
            while (false !== ($entry = readdir($handle))) {
                // Ignorar "." e ".."
                if ($entry != "." && $entry != "..") {
                    // Verificar se é diretório ou arquivo
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $entry)) {
                        // Se for diretório, exibir o nome e botão para remover
                        echo "<li>
                            <a href='$base_url$entry/' class='file-info'>
                                <span class='icon folder-icon'>&#128193;</span> $entry
                            </a>
                            <form action='' method='POST' style='display:inline;' onsubmit=\"return confirm('Tem certeza que deseja remover a pasta \'$entry\'?');\">
                                <input type='hidden' name='folder_name' value='$entry'>
                                <button type='submit' name='remove_folder' class='remove-btn'>Remover</button>
                            </form>
                        </li>";
                    } else {
                        // Se for arquivo, criar link que redireciona ao arquivo para abrir/rodar
                        echo "<li><a href='$base_url$entry' class='file-info'><span class='icon file-icon'>&#128196;</span> $entry</a></li>";
                    }
                }
            }
            // Fechar o diretório
            closedir($handle);
        }
        ?>

    </ul>

</body>
</html>
