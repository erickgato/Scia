function createTd(textnode) {
  //Cria uma td e adiciona um texto Design pattern Factory
  var T = document.createElement("td");
  var Node = document.createTextNode(textnode);
  T.appendChild(Node);
  return T;
}
var CreateA = (textnode, h = "#") => {
  const T = document.createElement("td");
  const a = document.createElement("a");
  const txt = document.createTextNode(textnode);
  a.append(txt);
  a.href = h;
  T.append(a);
  return T;
};
//Cria um objeto do tipo aluno e adiciona dois metodos a esse objeto
const Aluno = {
  Filter: (AlNome) => {
    var dowcasenome = AlNome.toLowerCase();
    const ListAlunos = document.getElementById("Al_Json").innerText;
    const DecodeAlunos = JSON.parse(ListAlunos);
    const DataTable = document.querySelector(".databody");
    DataTable.innerHTML = "";

    for (let i = 0; i < Object.keys(DecodeAlunos).length; i++) {
      var Select = DecodeAlunos[i]["Al_nome"].toLowerCase();
      var Result = Select.search(dowcasenome);
      var SelectResp = DecodeAlunos[i]["Al_sobrenome"].toLowerCase();
      var Resultresp = SelectResp.search(dowcasenome);
      if (Result > -1 || Resultresp > -1) {
        var tr = document.createElement("tr");
        var td = [];
        td.push(
          CreateA(
            DecodeAlunos[i]["Al_nome"] + " " + DecodeAlunos[i]["Al_sobrenome"],
            "?Cal=" + DecodeAlunos[i]["Al_cod"]
          )
        );
        td.push(createTd(DecodeAlunos[i]["Re_nome"]));
        td.push(createTd(DecodeAlunos[i]["Un_nome"]));
        td.push(createTd(DecodeAlunos[i]["Al_nascimento"]));
        td.push(createTd(DecodeAlunos[i]["Al_CPF"]));

        for (let itd = 0; itd < td.length; itd++) {
          tr.appendChild(td[itd]);
        }

        DataTable.appendChild(tr);
      }
    }
  },
};
const Responsavel = {
  Filter: (query) => {
    var dowcasenome = query.toLowerCase();
    const Json = document.getElementById("resp_Json").innerText;
    const DecodeResp = JSON.parse(Json);

    const DataTable = document.querySelector(".databody");
    DataTable.innerHTML = "";
    const anoatual = new Date().getFullYear();

    for (let i = 0; i < Object.keys(DecodeResp).length; i++) {
      var Select = DecodeResp[i]["Re_nome"].toLowerCase();
      var Result = Select.search(dowcasenome);
      if (Result > -1) {
        var splitidade = DecodeResp[i]["Re_nascimento"].split("-");
        var idade = anoatual - splitidade[0];
        var tr = document.createElement("tr");
        var td = [];
        td.push(CreateA(DecodeResp[i]["Re_nome"], "?Rid=" + DecodeResp[i]["Re_cod"]));
        td.push(createTd(DecodeResp[i]["Re_RG"]));
        td.push(createTd(DecodeResp[i]["Re_CPF"]));
        td.push(createTd(idade));
        td.push(
          createTd(
            DecodeResp[i]["TL_nome"] +
              " " +
              DecodeResp[i]["Re_logradouro"] +
              ", " +
              DecodeResp[i]["Ba_nome"]
          )
        );

        for (let itd = 0; itd < td.length; itd++) {
          tr.appendChild(td[itd]);
        }

        DataTable.appendChild(tr);
      }
    }
  },
};
const Liberacoes = {
  Filter: (query) => {
    var dowcasenome = query.toLowerCase();
    const Json = document.getElementById("jsondata").innerText;
    const DecodeLib = JSON.parse(Json);
    const DataTable = document.querySelector(".datbody");
    DataTable.innerHTML = "";
    for (let i = 0; i < Object.keys(DecodeLib).length; i++) {
      var Select = DecodeLib[i]["Al_nome"].toLowerCase();
      var Result = Select.search(dowcasenome);
      var Selectsobrenome = DecodeLib[i]["Al_sobrenome"].toLowerCase();
      var ResultSobrenome = Selectsobrenome.search(dowcasenome);
      if (Result > -1 || ResultSobrenome > -1) {
        var tr = document.createElement("tr");
        var td = [];
        td.push(
          createTd(DecodeLib[i]["Al_nome"] + " " + DecodeLib[i]["Al_sobrenome"])
        );
        td.push(createTd(DecodeLib[i]["Al_CPF"]));
        td.push(createTd(DecodeLib[i]["Oc_observacao"]));
        for (let itd = 0; itd < td.length; itd++) {
          tr.appendChild(td[itd]);
        }

        DataTable.appendChild(tr);
      }
    }
  },
};
const Funcionario = {
  Filter: (query) => {
    var dowcasenome = query.toLowerCase();
    const Json = document.getElementById("func_Json").innerText;
    const DecodeFunc = JSON.parse(Json);

    const DataTable = document.querySelector(".databody");
    DataTable.innerHTML = "";

    for (let i = 0; i < Object.keys(DecodeFunc).length; i++) {
      var Select = DecodeFunc[i]["Fu_nome"].toLowerCase();
      var Result = Select.search(dowcasenome);
      if (Result > -1) {
        var tr = document.createElement("tr");
        var td = [];
        td.push(CreateA(DecodeFunc[i]["Fu_nome"], "?Fid=" + DecodeFunc[i]["Fu_cod"]));
        td.push(createTd(DecodeFunc[i]["Fu_CPF"]));
        td.push(createTd(DecodeFunc[i]["Fu_matricula"]));
        td.push(createTd(DecodeFunc[i]["Un_nome"]));
        td.push(createTd(DecodeFunc[i]["TF_nome"]));

        for (let itd = 0; itd < td.length; itd++) {
          tr.appendChild(td[itd]);
        }

        DataTable.appendChild(tr);
      }
    }
  },
};
