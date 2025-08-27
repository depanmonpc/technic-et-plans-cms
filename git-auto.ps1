# git-auto.ps1
param(
    [string]$msg = ""
)

# Générer un message automatique avec date/heure si aucun n'est fourni
if ($msg -eq "") {
    $msg = "Update $(Get-Date -Format 'yyyy-MM-dd HH:mm')"
}

Write-Host "➡️ Git add ."
git add .

Write-Host "➡️ Git commit -m '$msg'"
git commit -m "$msg"

Write-Host "➡️ Git push"
git push
