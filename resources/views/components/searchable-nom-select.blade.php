<x-searchable-select-style />
<div class="wrapper nom-wrapper">
    <div
        class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
        <input type="text" name="nom" id="nom"
            class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0"
            placeholder="{{ $value ?? $slot }}" required/>
        <label html="nom"
            class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">{{ $value ?? $slot }}</label>
    </div>
    <div class="content">
    <ul class="options cursor-pointer"></ul>
    </div>
</div>
<script>
    const nomWrapper = document.querySelector(".nom-wrapper"),
    nomSelectBtn = nomWrapper.querySelector(".select-btn"),
    nomSearchInp = nomWrapper.querySelector("input"),
    nomOptions = nomWrapper.querySelector(".options");

let noms = ["ABBACI",
"AIT BAALLA",
"AIT HMAD",
"ALCABELARD",
"ANTUNES",
"BALLIGAND",
"BARROS",
"BARROS",
"BENADDOU",
"BERTRAND",
"BERTIN",
"BOITON",
"BOITON",
"BOURGEOIS",
"BOURGEOIS",
"BRASSEUR",
"CANNELLEC",
"CARO",
"CASOLA",
"CELEBI",
"CHANTEPIE",
"CIESIELSKI",
"CORDEAU",
"COULIBALY",
"DE BASTOS",
"DE FARIA",
"DEBLOIS",
"DIALLO",
"DUMESNIL",
"DUTEY",
"DYLAG",
"FALLA",
"FERHANE",
"FONTELLINE",
"FOURRE",
"GAAGAA",
"GARBAA",
"GONZAGA", 
"HAMDI",
"HUJA",
"IBRAHIMA",
"JEANNOT",
"KANGA",
"KICALI",
"KONE",
"KONE",
"LAPENNA",
"LEGER",
"LEROUX",
"LMARIOUH",
"M RAD",
"MADOUI",
"MARCHAND",
"MAREGA",
"MAURICE",
"MOHAMMADI",
"MONTEIRO",
"OLIVEIRA",
"PALLIGEN",
"PINTO FERNANDES",
"PINTO",
"RAOULT",
"REKIK",
"RENAULT",
"SAHIN",
"SAIDINI",
"SAMASSI",
"SANOGO",
"TAURAN",
"TOURE",
"TRAORE",
"VARANDAS",
"VARANDAS",
"VARELA",
"WOLE",
"YAGIZ"];

function addNom(selectedCountry) {
    nomOptions.innerHTML = "";
    noms.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updateNom(this)" class="flex items-center ${isSelected}">${country}</li>`;
        nomOptions.insertAdjacentHTML("beforeend", li);
    });
}
addNom();

function updateNom(selectedLi) {
    nomSearchInp.value = "";
    addNom(selectedLi.innerText);
    nomWrapper.classList.remove("active");
    nomSelectBtn.firstElementChild.value = selectedLi.innerText;
}

nomSearchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = nomSearchInp.value.toLowerCase();
    arr = noms.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == nomSelectBtn.firstElementChild.value ? "selected" : "";
        return `<li onclick="updateNom(this)" class="flex items-center ${isSelected}">${data}</li>`;
    }).join("");
    nomOptions.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! Nom introuvable</p>`;
});

nomSelectBtn.addEventListener("click", () => nomWrapper.classList.toggle("active"));
</script>