

function showUsers() {
    let userType = document.getElementById("userType").value;
    if (userType === "registered") {
        document.getElementById("registeredUsers").classList.remove("hidden");
        document.getElementById("unregisteredUsers").classList.add("hidden");
        document.getElementById("all").classList.add("hidden");
    } else if (userType === "unregistered") {
        document.getElementById("unregisteredUsers").classList.remove("hidden");
        document.getElementById("registeredUsers").classList.add("hidden");
        document.getElementById("all").classList.add("hidden");
    }
    else if (userType === "all") {
        document.getElementById("unregisteredUsers").classList.add("hidden");
        document.getElementById("registeredUsers").classList.add("hidden");
        document.getElementById("all").classList.remove("hidden");
    }
}
