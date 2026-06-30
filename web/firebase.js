import { initializeApp } 
from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";

import { getAuth } 
from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";


const firebaseConfig = {
  apiKey: "AIzaSyDA5TAFCpOuESmefqLI2jIDRYljZM7Lqhk",
  authDomain: "ombak-biru-digital.firebaseapp.com",
  projectId: "ombak-biru-digital",
  storageBucket: "ombak-biru-digital.firebasestorage.app",
  messagingSenderId: "541391213342",
  appId: "1:541391213342:web:ffed7bba8b165cb746af0f"
};


const app = initializeApp(firebaseConfig);


export const auth = getAuth(app);