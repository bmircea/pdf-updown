taskkill /F /IM chromedriver.exe
taskkill /F /IM java.exe
taskkill /F /IM chrome.exe /T > nul
start "" "C:\Program Files (x86)\Java\jre1.8.0_161\bin\java.exe"
taskkill /F /IM cmd.exe
start http://localhost/declaratii
exit