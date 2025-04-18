<?php
$current_dir = getcwd();

chdir(realpath(__DIR__ . '/..'));

$batch_file = "temp_run_script.bat";

$batch_content = "@echo off\r\n";
$batch_content .= "call .venv\\Scripts\\activate.bat\r\n";  
$batch_content .= "python controller/train_model.py\r\n";  
$batch_content .= "call deactivate\r\n";                    

file_put_contents($batch_file, $batch_content);

$cmd = "cmd /c $batch_file 2>&1";
$output = shell_exec($cmd);

unlink($batch_file);

chdir($current_dir);


error_log("Python script output: " . ($output ? $output : "No output"));

if ($output && (strpos($output, 'berhasil') !== false || strpos($output, 'Model berhasil') !== false)) {
    echo "<script>alert('Proses pelatihan selesai! Model dan CSV berhasil disimpan.'); window.location.href = '../index.php?page=latih_data';</script>";
} 
else if ($output && (strpos($output, 'Error') !== false || strpos($output, 'Traceback') !== false)) {
    $clean_error = substr(preg_replace('/[\r\n]+/', ' ', addslashes($output)), 0, 500);
    echo "<script>alert('Gagal: $clean_error'); window.location.href = '../index.php?page=latih_data';</script>";
}
else {
    echo "<script>alert('Proses pelatihan selesai! Model dan CSV berhasil disimpan.'); window.location.href = '../index.php?page=latih_data';</script>";
}
?>