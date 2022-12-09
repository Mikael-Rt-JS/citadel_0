let menuBtn=$('brgMenu');
let menu=$('menu');

// let brgClass=new BurgerMenu();

menuBtn.addEventListener('click',e=>{
  if(menuBtn.classList.contains('menu-btn')){
    menuBtn.classList.replace('menu-btn','active');
    menu.classList.toggle('menu-active');
  }else{
    menuBtn.classList.replace('active','menu-btn');
    menu.classList.toggle('menu-active');
  }
})

async function menuToInHTML(){
  let menu=await post('../citadel_0/systems/getMenu.php',{'menu':true});
  let str="";
  if(await menu){
    for(let i=0;i<menu.menu_link.length;i++){
      if(menu.menu_link[i].includes('_')){
        str+=`<li><a href="${menu.main_path+menu.menu_link[i]}">${menu.menu_link[i].replace('_', ' ')}</a></li>`
      }else{
        str+=`<li><a href="${menu.main_path+menu.menu_link[i]}">${menu.menu_link[i]}</a></li>`
      }
    }
    $('list_menu').innerHTML=str;
    $('left_menu').innerHTML=str;
  }

}

menuToInHTML()