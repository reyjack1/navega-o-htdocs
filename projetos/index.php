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
        // Caminho do diretório atual
        $dir = __DIR__;
        
        // Abrir o diretório
        if ($handle = opendir($dir)) {
            // Ler os arquivos e pastas
            while (false !== ($entry = readdir($handle))) {
                // Ignorar "." e ".."
                if ($entry != "." && $entry != "..") {
                    // Verificar se é diretório ou arquivo
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $entry)) {
                        // Se for diretório, criar link para navegar até ele com ícone de pasta
                        echo "<li><a href='$entry/' class='file-info'><span class='icon folder-icon'>&#128193;</span> $entry</a></li>";
                    } else {
                        // Se for arquivo, criar link para abrir com ícone de arquivo
                        echo "<li><a href='$entry' class='file-info'><span class='icon file-icon'>&#128196;</span> $entry</a></li>";
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
