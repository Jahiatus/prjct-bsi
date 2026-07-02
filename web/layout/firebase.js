// Firebase
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";

import {
    getAuth,
    GoogleAuthProvider,
    signInWithPopup
} from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";



const firebaseConfig = {

    apiKey: "AIzaSyDA5TAFCpOuESmefqLI2jIDRYljZM7Lqhk",

    authDomain: "ombak-biru-digital.firebaseapp.com",

    projectId: "ombak-biru-digital",

    storageBucket: "ombak-biru-digital.firebasestorage.app",

    messagingSenderId: "541391213342",

    appId: "1:541391213342:web:ffed7bba8b165cb746af0f"

};



const app = initializeApp(firebaseConfig);


const auth = getAuth(app);


const provider = new GoogleAuthProvider();



const googleBtn = document.getElementById("googleLogin");



googleBtn.addEventListener("click", async () => {


    try {


        const result = await signInWithPopup(
            auth,
            provider
        );


        const user = result.user;



        alert(
            "Login Google berhasil : " + user.displayName
        );

        await fetch('login_google.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                name: user.displayName,
                email: user.email
            })
        });

        window.location.href = "homepage.php";



    } catch(error){


        console.log(error);


        alert(
            "Firebase Error : " + error.code
        );


    }


});