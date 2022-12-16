const inputs = document.querySelectorAll(".input");

function addcl() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
  let loi = document.querySelector("#loi");
  if (loi != null) loi.style.display = "none";
}

function remcl() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", addcl);
  input.addEventListener("blur", remcl);
});

// Add class css cho Menu chính
const limenus = document.querySelectorAll('.taga');

function add_taga_i(){
    limenus.forEach(element => {
        let tagchild = element.childNodes;
        tagchild[0].classList.remove("i_to");
        tagchild[1].classList.remove("to");
        element.parentNode.classList.remove("test");
    });
    let tagchild = this.childNodes;
    console.log(tagchild);
	tagchild[0].classList.add("i_to");
    tagchild[1].classList.add("to");
    this.parentNode.classList.add("test");

    var check_section_menu = document.querySelectorAll('.infor_main h1');
    for(var i=0;i<check_section_menu.length;i++){
        if(this.childNodes[1].innerHTML == check_section_menu[i].innerHTML){
            
            for(var j=0;j<check_section_menu.length;j++){
                if(i!=j){
                    check_section_menu[j].parentNode.parentNode.classList.add("infor_hidden");
                console.log('a');}
                else{
                    check_section_menu[j].parentNode.parentNode.classList.remove("infor_hidden");
                }
            }
            break;
        }
        else{
            check_section_menu[i].parentNode.parentNode.classList.remove("infor_hidden");
        }
    }
}


limenus.forEach(element => {
    element.addEventListener("click", add_taga_i);
});

// Section Menu Content


const class_content = document.querySelectorAll(".class");

function bold(item){
    for(var i=0;i<item.length;i++){
        item[i].classList.remove("class_bold");
    }
    for(var i=0;i<item.length;i++){
        if(i%2==0){
            item[i].classList.add("class_bold");
        }
    }
}

bold(class_content);

for(var i=0;i<class_content.length;i++){
    class_content[i].addEventListener("click",function(){
        if(this.className.indexOf("class_background") >= 0){
            this.classList.remove("class_background");
        }
        else    
        this.classList.add("class_background");
    }); 
}

