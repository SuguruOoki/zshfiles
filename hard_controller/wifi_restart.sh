# wifiをON/OFFする
function wifiConnect() {
    networksetup -setairportpower en0 off
    networksetup -setairportpower en0 on
}
