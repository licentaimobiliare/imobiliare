var timeout = 500;
var closetimer = 0;
var ddmenuitem = 0; 
// deschide stratul ascuns
function mopen(id)
{ 
      // anuleaza close-timer-ul (pentru inchiderea pop-upurilor
      // dupa o perioada de timp pre-determinata)
      mcancelclosetime(); 
      // inchide stratul vechi
      if(ddmenuitem) ddmenuitem.style.visibility = 'hidden'; 
      // obtine urmatorul strat si afiseaza-l
      ddmenuitem = document.getElementById(id);
      ddmenuitem.style.visibility = 'visible'; 
}
// inchide stratul afisat
function mclose()
{
      if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
} 
// mergi la close timer
function mclosetime()
{
      closetimer = window.setTimeout(mclose, timeout);
} 
// anuleaza close timer
function mcancelclosetime()
{
      if(closetimer)
      {
            window.clearTimeout(closetimer);
            closetimer = null;
      }
} 
// inchide stratul la click-out
document.onclick = mclose;

