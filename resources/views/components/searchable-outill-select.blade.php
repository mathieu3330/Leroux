<x-searchable-select-style />
<div class="wrapper outil-wrapper">
    <div
        class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
        <input type="text" name="outil" id="outil"
            class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0"
            placeholder="{{ $value ?? $slot }}" required/>
        <label html="outil"
            class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">{{ $value ?? $slot }}</label>
    </div>
    <div class="content" style="z-index: 1;">
    <ul class="options cursor-pointer"></ul>
    </div>
</div>
<script>
    const wrapper = document.querySelector(".outil-wrapper"),
    selectBtn = wrapper.querySelector(".select-btn"),
    searchInp = wrapper.querySelector("input"),
    options = wrapper.querySelector(".options");

let villes = ["IM 90 XI"

,"IM 45 GN LI"

,"PERFORATEUR FILAIRE"

,"PERFORATEUR BATTERIE"

,"VISSEUSE"

,"VISSEUSE A CHOC"

,"VISSEUSE BARDAGE"

,"BOULONEUSE"

,"SCIE CIRCULAIRE"

,"SCIE SAUTEUSE"

,"SCIE SABRE"

,"DISQUEUSE FILAIRE"

,"DISQUEUSE A BATTERIE"

,"GRINOTEUSE"

,"SERTISEUSE ELECTRIQUE"

,"WUKO Lock’n’Roller 1040"

,"PINCE A LARMIER"

,"CISAILLE PELICAN"

,"CISAILLE DROITE"

,"CISAILLE GAUCHE"

,"PEINCE COUDEE"

,"PINCE A ARDOISE"

,"PEINCE  A BORDER"

,"BOUTEILLE DE GAZ"

,"CISAILLE TOLE"

,"FER A SOUDER"

,"OUTILLAGE SPECIAL"

,"RALONGE"

,"FILETS BAS DE PENTE"

,"FILETS SOUS CHARPENTE"

,"ECHELLE PLATE"

,"ECHELLE COULISSANTE"

,"ECHELLE ALU"

,"CASQUE"

,"CHAUSSURE DE SECURITE"

,"PROTECTION OCULAIRE"

,"PROTECTION AUDITIVE"

,"GILLET"

,"GENOUILLERE"];

function addVille(selectedCountry) {
    options.innerHTML = "";
    villes.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="flex items-center ${isSelected}">${country}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}
addVille();

function updateName(selectedLi) {
    searchInp.value = "";
    addVille(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.firstElementChild.value = selectedLi.innerText;
}

searchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp.value.toLowerCase();
    arr = villes.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn.firstElementChild.value ? "selected" : "";
        return `<li onclick="updateName(this)" class="flex items-center ${isSelected}">${data}</li>`;
    }).join("");
    options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! Ville introuvable</p>`;
});

selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));
</script>