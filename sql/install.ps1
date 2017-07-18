
$sql_files = get-childitem *.sql
$files = @($sql_files[1], $sql_files[0], $sql_files[2])

foreach ($sql_file in $files) {
	add-content install.sql (get-content $sql_file)
}
