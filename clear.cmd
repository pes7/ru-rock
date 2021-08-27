@echo off

setlocal

set "folder=C:\XamppNew\htdocs\ru-rock\web\music\noga\vostok"
set "number=3"

pushd "%folder%"
for /f "delims=" %%i in ('2^>nul dir/a-d/b') do (
 set name=%%~ni
 2>nul cmd/v/c ren "%%i" "!name:~%number%!%%~xi"
)
popd

endlocal