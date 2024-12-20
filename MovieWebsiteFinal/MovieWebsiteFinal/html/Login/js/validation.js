console.log("Iz connected");

const validation = new JustValidate("#signup");

validation
       .addField("#fname", [
             {
                rule: "required"
             }
       ])
       .addField("#lname", [
             {
                rule: "required"
             }
       ])
       .addField("#email", [
             {
                rule: "required"
             },
             {
                rule: "email"
             }
       ])
       .addField("#password", [
             {
                rule: "required"
             },
             {
                rule: "password"
             }
       ])
       .addField("#password_confirmation", [
             {
                validator: (value, fields) => {
                    return value === fields["#password"].elem.value;
                },
                errorMessage: "Passwords should match"
             }
       ])
       .onSuccess((event) => {
          document.getElementById("signup").submit();
       })
       ;