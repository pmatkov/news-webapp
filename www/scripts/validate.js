function validate_article_form(event) {

    var title = document.getElementById("title");
    var summary = document.getElementById("summary");
    var contents = document.getElementById("contents");
    var image = document.getElementById("image");
    var category = document.getElementById("category");

    var titlemsg =  document.getElementById("titlemsg");
    var summarymsg =  document.getElementById("summarymsg");
    var contentsmsg =  document.getElementById("contentsmsg");
    var imagemsg =  document.getElementById("imagemsg");
    var categorymsg =  document.getElementById("categorymsg");

    var contimg = document.getElementById("container-inside-img");

    var sendform = true;

    if (title.value.length < 10 || title.value.length > 100) {
        title.style.border = "1px solid red";
        titlemsg.innerHTML = "Title must be between 10 and 100 characters.";
        sendform = false;
    }

    if (summary.value.length < 50 || summary.value.length > 200) {
        summary.style.border = "1px solid red";
        summarymsg.innerHTML = "Summary must be between 50 and 200 characters.";
        sendform = false;
    }

    if (contents.value.trim() === "") {
        contents.style.border = "1px solid red";
        contentsmsg.innerHTML = "Contents must not be empty.";
        sendform = false;
    }

    if (!image.files.length && (!contimg || contimg.style.display === "none")) {
        imagemsg.innerHTML = "Image must be selected.";
        sendform = false;
    }

    if (!category.value) {
        category.style.border = "1px solid red";
        categorymsg.innerHTML = "Category must be selected.";
        sendform = false;
    }

    if (!sendform)    
        event.preventDefault();
    
}

function reset_article_form() {

    var title = document.getElementById("title");
    var summary = document.getElementById("summary");
    var contents = document.getElementById("contents");
    var category = document.getElementById("category");

    title.value = "";
    title.style.border = "";
    summary.value = "";
    summary.style.border = "";
    contents.value = "";
    contents.style.border = "";
    category.selectedIndex = 0;
    category.style.border = "";

    document.getElementById("titlemsg").innerHTML = "";
    document.getElementById("summarymsg").innerHTML = "";
    document.getElementById("contentsmsg").innerHTML = "";
    document.getElementById("imagemsg").innerHTML = "";
    document.getElementById("categorymsg").innerHTML = "";

    document.getElementById("container-inside-img").style.display = "none";
    document.getElementById("image").value = "";

}

function validate_login_form(event) {

    var username = document.getElementById("user");
    var password = document.getElementById("pass");

    var usernamemsg = document.getElementById("usermsg");
    var passwordmsg = document.getElementById("passmsg");

    var sendform = true;

    if (username.value.trim() === "") {
        username.style.border = "1px solid red";
        usernamemsg.innerHTML = "Username must not be empty.";
        sendform = false;
    }

    if (password.value.trim() === "") {
        password.style.border = "1px solid red";
        passwordmsg.innerHTML = "Password must not be empty.";
        sendform = false;
    }

    if (!sendform)
        event.preventDefault();
}

function reset_login_form() {

    var username = document.getElementById("user");
    var password = document.getElementById("pass");

    username.value = "";
    username.style.border = "";
    password.value = "";
    password.style.border = "";

    document.getElementById("usermsg").innerHTML = "";
    document.getElementById("passmsg").innerHTML = "";

    if (document.getElementById("message"))
        document.getElementById("message").style.display = "none";

}

function validate_registration_form(event) {

    var name = document.getElementById("fname");
    var surname = document.getElementById("lname");
    var username = document.getElementById("uname");
    var password = document.getElementById("passw");
    var repassword = document.getElementById("repassw");

    var namemsg =  document.getElementById("namemsg");
    var surnamemsg =  document.getElementById("surnamemsg");
    var usernamemsg =  document.getElementById("usernamemsg");
    var passwordmsg =  document.getElementById("passwordmsg");
    var repasswordmsg =  document.getElementById("repasswordmsg");

    var sendform = true;

    if (name.value.trim() === "") {
        name.style.border = "1px solid red";
        namemsg.innerHTML = "Name must not be empty.";
        sendform = false;
    }

    if (surname.value.trim() === "") {
        surname.style.border = "1px solid red";
        surnamemsg.innerHTML = "Surname must not be empty.";
        sendform = false;
    }

    if (username.value.trim() === "") {
        username.style.border = "1px solid red";
        usernamemsg.innerHTML = "Username must not be empty.";
        sendform = false;
    }

    if (password.value.length < 8) {
        password.style.border = "1px solid red";
        passwordmsg.innerHTML = "Password must be at least 8 characters long.";
        sendform = false;
    }

    if (repassword.value.length < 8) {
        repassword.style.border = "1px solid red";
        repasswordmsg.innerHTML = "Password must be at least 8 characters long.";
        sendform = false;
    }
    else if (password.value !== repassword.value) {
        repassword.style.border = "1px solid red";
        repasswordmsg.innerHTML = "Passwords must match.";
        sendform = false;
    }

    if (!sendform)    
        event.preventDefault();
    
}

function reset_registration_form() {

    var name = document.getElementById("fname");
    var surname = document.getElementById("lname");
    var username = document.getElementById("uname");
    var password = document.getElementById("passw");
    var repassword = document.getElementById("repassw");

    name.value = "";
    name.style.border = "";
    surname.value = "";
    surname.style.border = "";
    username.value = "";
    username.style.border = "";
    password.value = "";
    password.style.border = "";
    repassword.value = "";
    repassword.style.border = "";

    document.getElementById("namemsg").innerHTML = "";
    document.getElementById("surnamemsg").innerHTML = "";
    document.getElementById("usernamemsg").innerHTML = "";
    document.getElementById("passwordmsg").innerHTML = "";
    document.getElementById("repasswordmsg").innerHTML = "";

    
    if (document.getElementById("message"))
        document.getElementById("message").style.display = "none";

}

function check_image_selection() {

    var image = document.getElementById("image");

    if (image.files && image.files[0]) {

        var reader = new FileReader();

        reader.onload = function(event) {

            document.getElementById("selected-image").src = event.target.result;
            document.getElementById("selected-caption").innerHTML = image.files[0].name;
        };
    
        reader.readAsDataURL(image.files[0]);

    }
}