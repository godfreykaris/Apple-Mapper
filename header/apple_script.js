

function bootnavbar(options) 
{
        const defaultOption = 
        {
          selector: "main_navbar",
          animation: true,
          animateIn: "animate__fadeIn",
        };

        const bnOptions = { ...defaultOption, ...options };

        init = function () 
        {
          var dropdowns = document.getElementById(bnOptions.selector).getElementsByClassName("dropdown");

          Array.prototype.forEach.call(dropdowns, (item) => 
          {
                //add animation
                if (bnOptions.animation) {
                  const element = item.querySelector(".dropdown-menu");
                  element.classList.add("animate__animated");
                  element.classList.add(bnOptions.animateIn);
                }

                //hover effects
                item.addEventListener("mouseover", function () {
                  this.classList.add("show");
                  const element = this.querySelector(".dropdown-menu");
                  element.classList.add("show");
                });

                item.addEventListener("mouseout", function () {
                  this.classList.remove("show");
                  const element = this.querySelector(".dropdown-menu");
                  element.classList.remove("show");
                });
          });
        };

        init();
}


document.addEventListener("DOMContentLoaded", function(){
      // make it as accordion for smaller screens
      if (window.innerWidth < 902) 
      {         
        document.querySelectorAll('.dropdown-menu a, .dropdown a').forEach(function(element){
          element.addEventListener('click', function (e) {
              let nextEl = this.nextElementSibling;
              if(nextEl && nextEl.classList.contains('dropdown-menu')) 
              {
                // prevent opening link if link needs to open dropdown
                e.preventDefault();

                let dropdown_menu_items = nextEl.children;
              
                for (let i = 0; i < dropdown_menu_items.length; i++) 
                {
                  // check if a menu item is a dropdown itself
                  if(dropdown_menu_items[i] && dropdown_menu_items[i].classList.contains('dropdown'))
                  {
                      let subdropdown_menu_items = dropdown_menu_items[i].children;

                      // close dropdown menu in this level
                      for (let i = 0; i < subdropdown_menu_items.length; i++)
                      {
                        if(subdropdown_menu_items[i] && subdropdown_menu_items[i].classList.contains('dropdown-menu'))
                          {
                            if(subdropdown_menu_items[i].style.display == 'block')
                            {
                              subdropdown_menu_items[i].style.display = 'none';
                            }
                          }
                        
                      }
                      
                  }
                  
                }
               
                if(nextEl.style.display == 'block')  //close the top level dropdown menu if it is open
                {
                  nextEl.style.display = 'none';
                } 
                else                                 //open it if it is closed
                {
                    
                  nextEl.style.display = 'block';
                }
      
              }
          });
        })
      }

    });


    $(document).click(function (event) {
      if (window.innerWidth < 902) 
      {
        var clickover = $(event.target);
        var $navbar = $(".navbar-collapse");               
        var _opened = $navbar.hasClass("show");

        //if clicked outside the menu
        if (_opened === true && !(event.target.classList.contains("dropdown-item")  || event.target.classList.contains("dropdown-toggle")))
        {
          $navbar.collapse('hide');
        }
    }
  });

