<x-searchable-select-style />
<div class="wrapper prenom-wrapper">
    <div
        class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
        <input type="text" name="prenom" id="prenom"
            class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0"
            placeholder="{{ $value ?? $slot }}" required/>
        <label html="prenom"
            class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">{{ $value ?? $slot }}</label>
    </div>
    <div class="content">
    <ul class="options cursor-pointer"></ul>
    </div>
</div>
<script>
    const prenomWrapper = document.querySelector(".prenom-wrapper"),
    prenomSelectBtn = prenomWrapper.querySelector(".select-btn"),
    prenomSearchInp = prenomWrapper.querySelector("input"),
    prenomOptions = prenomWrapper.querySelector(".options");

let prenoms = ["MALEK    ",
"AZIZ     ",
"LAHSEN   ",
"FRITZ    ",
"FRANCISCO",
"GAEL     ",
"CARLOS   ",
"NARCISO  ",
"MOHAMMED ",
"YANNICK  ",
"MARC     ",
"JEAN-LUC ",
"JONATHAN ",
"MAXIME   ",
"PIERRE   ",
"BENOIT   ",
"KEVIN    ",
"NICOLAS  ",
"MICKAEL  ",
"MEHMET   ",
"PASCAL   ",
"THIERRY  ",
"QUENTIN  ",
"ABOUBACAR",
"JOAQUIM  ",
"DAVID    ",
"LAURENT  ",
"OUMAR    ",
"OLIVIER  ",
"STEVENS  ",
"JEROME   ",
"JONATHAN ",
"HOUCINE  ",
"JOHAN    ",
"FLORENT  ",
"ABDERAZAG",
"SAMI     ",
"ANTERO   ",
"ATMANE   ",
"IOAN     ",
"NASSER   ",
"FREDERIC ",
"LANO     ",
"SEVKET   ",
"AMADOU   ",
"GAOUSSOU ",
"CYRIL    ",
"NICOLAS  ",
"CHRISTOPH",
"OTHMAN   ",
"SAHBI    ",
"SAMIR    ",
"SEBASTIEN",
"SEYDOU   ",
"ANTHONY  ",
"MOHAMMAD ",
"JAIME    ",
"THIERRY  ",
"NICOLAS  ",
"MADOUENO ",
"LUIS     ",
"FRANCK   ",
"KAIS     ",
"CYRIL    ",
"DURSUN   ",
"NASSER   ",
"ABOU     ",
"BABA     ",
"CATHERINE",
"KALILOU  ",
"MOHAMMED ",
"JOSE     ",
"KEVIN    ",
"JOSE     ",
"EMMANUEL ",
"NURETTIN "];

function addPrenom(selectedCountry) {
    prenomOptions.innerHTML = "";
    prenoms.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updatePrenom(this)" class="flex items-center ${isSelected}">${country}</li>`;
        prenomOptions.insertAdjacentHTML("beforeend", li);
    });
}
addPrenom();

function updatePrenom(selectedLi) {
    prenomSearchInp.value = "";
    addPrenom(selectedLi.innerText);
    prenomWrapper.classList.remove("active");
    prenomSelectBtn.firstElementChild.value = selectedLi.innerText;
}

prenomSearchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = prenomSearchInp.value.toLowerCase();
    arr = prenoms.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == prenomSelectBtn.firstElementChild.value ? "selected" : "";
        return `<li onclick="updatePrenom(this)" class="flex items-center ${isSelected}">${data}</li>`;
    }).join("");
    prenomOptions.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! Prenom introuvable</p>`;
});

prenomSelectBtn.addEventListener("click", () => prenomWrapper.classList.toggle("active"));
</script>