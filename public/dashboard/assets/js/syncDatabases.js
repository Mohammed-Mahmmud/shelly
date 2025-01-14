function updateConnectionStatus() {
    const statusElement = document.getElementById("connectionStatus");
    const syncButton = document.getElementById("syncButton");
    const statusSyncDiv = document.querySelector(".status-sync-report"); // Select the status-sync div

    if (navigator.onLine) {
        statusElement.textContent = "You are online!";
        statusElement.classList.add("online");
        statusElement.classList.remove("offline");
        syncButton.style.display = "block"; // Show the button
        statusSyncDiv.style.display = "block"; // Show the status-sync div
    } else {
        statusElement.textContent = "You are offline!";
        statusElement.classList.add("offline");
        statusElement.classList.remove("online");
        syncButton.style.display = "none"; // Hide the button
        statusSyncDiv.style.display = "none"; // Hide the status-sync div
    }
}

// Check the connection status when the page loads
window.addEventListener("load", updateConnectionStatus);

// Listen for online and offline events
window.addEventListener("online", updateConnectionStatus);
window.addEventListener("offline", updateConnectionStatus);
