function createTd(textnode){
    //Cria uma td e adiciona um texto Design pattern Factory 
    var T =   document.createElement("td")
    var Node = document.createTextNode(textnode)
    T.appendChild(Node)
    return T

}
//Cria um objeto do tipo aluno e adiciona dois metodos a esse objeto
let Aluno = {
    Filter: (AlNome) => {
        let dowcasenome = AlNome.toLowerCase()
        const ListAlunos = document.getElementById("Al_Json").innerText
        const DecodeAlunos = JSON.parse(ListAlunos)
        const DataTable = document.querySelector(".databody")
        DataTable.innerHTML = "";
        for(let i = 0; i < Object.keys(DecodeAlunos).length; i ++ ){
            var Select = DecodeAlunos[i]['Al_nome'].toLowerCase()
            var Result = Select.search(dowcasenome)
            if(Result > -1){
                var tr = document.createElement("tr")
                var td = []
                td.push(createTd(DecodeAlunos[i]['Al_nome'] + " " +  DecodeAlunos[i]['Al_sobrenome'] ))
                td.push(createTd(DecodeAlunos[i]['Re_nome']))
                td.push(createTd(DecodeAlunos[i]['Un_nome']))
                td.push(createTd(DecodeAlunos[i]['Al_nascimento']))
                td.push(createTd(DecodeAlunos[i]['Al_CPF']))

                for(let itd = 0; itd < td.length; itd ++ ){
                    tr.appendChild(td[itd])
                }
            
                DataTable.appendChild(tr)
            }
            
        }
    }
}
window.onload = () =>{
    Aluno.Filter('')
}