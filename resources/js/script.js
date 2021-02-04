const { default: axios } = require("axios")

let navbar = document.querySelector('#navbar')
let navLogo = document.querySelector('#navLogo')
let navLinks = document.querySelectorAll('.nav-link')
let hamburger = document.querySelector('.hamburger')
let src = document.querySelector('#src')
let header = document.querySelector('#header')
let home = document.querySelector('#homepage')
let cardZ = document.querySelectorAll('.cardZ')
let navDrop = document.querySelector('#navbarsExample04')
let filler = document.querySelector('#filler')


if(home){
    header.classList.add('header_bg')
    cardZ.forEach(el => {
        el.classList.add('mx-3')
        el.classList.remove('mx-auto')
    })
    src.style.marginTop = '300px'    
}else{
    header.classList.add('halfheader_bg')
}

if(window.innerWidth > 1200) {
    document.addEventListener('scroll',()=> {

        if (window.pageYOffset > 700) {
            navbar.classList.remove('bg-transparent','animate__fadeOutUp')
            navbar.classList.add('bg-white','shadow','fixed-top','animate__fadeInDown','animate__animated')
            filler.classList.add('invisibile')
            filler.classList.remove('d-none')
            navLogo.src = "/media/logo-black.png"
            navLogo.setAttribute('height','90')
            navLinks.forEach(el => {
                el.classList.remove('text-light')
                el.classList.add('text-dark')
            });
        } else if (window.pageYOffset < 500 && window.pageYOffset > 50) {   
            
            navbar.classList.remove('shadow','animate__fadeInDown')
            navbar.classList.add('bg-transparent','animate__fadeOutUp')
       
        } else if (window.pageYOffset < 50) {
            navbar.classList.remove('fixed-top','animate__animated')
            filler.classList.remove('invisibile')
            filler.classList.add('d-none')
            navLogo.src = "/media/logo-black.png"
            navLogo.src = "/media/logo-white.png"
            navLogo.setAttribute('height','120')
            navLinks.forEach(el => {
                el.classList.add('text-light')
                el.classList.remove('text-dark')
            }); 
         }

    })
} else {
    navbar.classList.remove('bg-transparent')
    navbar.classList.add('bg-white')
    navLogo.src = "/media/logo-black.png"
    navLogo.setAttribute('height','90')
    navLinks.forEach(el => {
        el.classList.remove('text-light','h3')
        el.classList.add('text-dark','lead')
    });
    header.classList.add('halfheader_bg')
    src.style.marginTop = '50px'
    navDrop.classList.toggle('customDropdown')
}

//Fetch form contatti con chiamata ajax

// let name = document.getElementById('name');
// let surname = document.getElementById('surname');
// let telephone = document.getElementById('telephone');
// let email = document.getElementById('email');
// let age = document.getElementById('age');
// let cv = document.getElementById('cv');



    //creo una funzione con scope globale
    window.send = ()=>{ 
      
    
    //dichiaro una nuova costante form data come nuovo oggetto della classe FormData, ma non istanzio nulla.
    const formData = new FormData();
    //Catturo gli input dal form html usando l'id e creo un nuovo formdata object(un oggetto chiave valore che permette di accettare gli input attraverso una chiamata ajax) "appendendoci" dentro i valori dell'input. uso .value per ottenere in valore effettivo dell'input e non il codice html che lo compone

        formData.append('name', nme.value);
        formData.append('surname', surname.value);
        formData.append('telephone', telephone.value);
        formData.append('email', email.value);
        formData.append('age', age.value);
        formData.append('cv', cv.files[0]); 
     
    //semplifico la chiamata ajax usando la libreria axios portata dallo scaffholding di bottstrap. Nella chiamata specifico il metodo post per l'invio del form, url della funzione store nel controller, passo l'oggetto formdata con i dati catturati dagli input, che porta con se la specifica di tipologia input 'multipart/form-data dunque permettendomi di non specificarla. La chiamata è asincrona, quindi specifico .then perchè soltanto dopo che l'invio dati sarà completato venga lanciata la funzione response che apre un alert con in stampa il return della funzione new in controller (un json con scritto bravo)

    axios({ 
        method: 'post',
        url: '/team/new',
        data: formData,    
        // headers: {
        //     'content-type': 'multipart/form-data'
        // }
        })           
    .then(function (response) {
        alert(response.data)
        cv.files[0] = "";
    })

    // axios.post("/team/new", {
    //     data:formData
    // })
    // .then(function (response) {
    //         alert(response.data)
    //         cv.files[0] = "";

    const fetchData = async() => {
        const response = await axios.post('/team/new',{data: formData})
                    .then(function (response) {
                    alert(response.data)
                    cv.files[0] = "";
    

    nme.value = ""
    surname.value = ""
    telephone.value = ""
    email.value = ""
    age.value = ""
  })}}


//leaflet marker = cluster gen script


  let mapid = document.querySelector('#mapid')
  if(mapid){
  let breweryMap = document.querySelectorAll('.breweryMap')
  let firstLat = breweryMap[0].getAttribute('lat')
  let firstLon = breweryMap[0].getAttribute('lon')
  
  let mymap = L.map('mapid').setView([firstLat,firstLon], 13);
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiZGFyaW9lbGVmYW50ZSIsImEiOiJja2p4Mmo2cWcwbzFmMnZsN2NuOGxzbXZ1In0.jcYV_OvImDtk4evVpdsVVA'
    }).addTo(mymap);

   
    let greenIcon = L.icon({
      iconUrl: '/media/marker2.png',        
      iconSize:     [45, 50], // size of the icon       
      iconAnchor:   [20, 25], // point of the icon which will correspond to marker's location       
      popupAnchor:  [5, -26] // point from which the popup should open relative to the iconAnchor
    }); 

  let markers = L.markerClusterGroup();
  
  breweryMap.forEach(el => {
    let lat = el.getAttribute('lat')
    let lon = el.getAttribute('lon')
    let name = el.getAttribute('name')
    let description = el.getAttribute("description")
    let img = el.getAttribute('img')
    let link = el.getAttribute('link')

    let info = `
                <p class="font-weight-bold text-main p-3 mb-1 bg_dark rounded-top h5">${name}</p>
                <p class="text-truncate px-2">${description}</p>
                <div class="d-flex justify-content-end">
                    <a href="${link}" class=" btn text-dark bg-gold px-3 py-1 rounded-pill">Vai</a>
                </div>
                `

    let marker = L.marker([lat, lon],{icon: greenIcon})
    .bindPopup(info).openPopup()
    markers.addLayer(marker);

  });

  mymap.addLayer(markers);
  }
  




