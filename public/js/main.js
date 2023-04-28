function showDrop(element) {
  // alert('hi ' + elem.tagName);
  var dropContent = element.nextElementSibling;
  if (dropContent.classList.contains("drop-content")) {
    dropContent.classList.toggle("show");
  }
  element.classList.toggle("show");
  // alert(dropContent);
}

class DashboardController {
  constructor(dashboardwrapId) {
    this.dashboardWrap = document.getElementById(dashboardwrapId);
    this.winState = "some";
    this.btnState = "some";
    this.buttonStates = ["open", "close"];
    this.windowStates = ["mobile", "tablet", "desktop"];

    window.addEventListener('resize', this.getWindowSize.bind(this));
    this.getWindowSize();
  }

  setState() {
    // set button class
    for (const i of this.windowStates) {
      if (this.winState == i) {
        // alert("Add  "+i+"-"+j);
        this.dashboardWrap.classList.add(i);
      } else {
        // alert("Remove  "+i+"-"+j);
        this.dashboardWrap.classList.remove(i);
      }
    }
    // set window class
    for (const j of this.buttonStates) {
      if (this.btnState == j) {
        // alert("Add  "+i+"-"+j);
        this.dashboardWrap.classList.add(j);
      } else {
        // alert("Remove  "+i+"-"+j);
        this.dashboardWrap.classList.remove(j);
      }
    }
  }

  toggleMenu() {
    if (this.btnState == "open") {
      this.btnState = "close";
      this.setState();
    } else if (this.btnState == "close") {
      this.btnState = "open";
      this.setState();
    }
  }

  getWindowSize() {
    if (window.matchMedia("(min-width: 992px)").matches) {
      if (this.winState != "desktop") {
        this.winState = "desktop";
        this.btnState = "open";
        this.setState();
      }
    } else if (window.matchMedia("(min-width: 576px)").matches) {
      if (this.winState != "tablet") {
        this.winState = "tablet";
        this.btnState = "close";
        this.setState();
      }
    } else {
      if (this.winState != "mobile") {
        this.winState = "mobile";
        this.btnState = "close";
        this.setState();
      }
    }
  }
}

class ScrollHandler {
  constructor(scrollwrapId) {
    this.scrollwrap = document.getElementById(scrollwrapId);
    let scrollMenu = this.scrollwrap.getElementsByClassName("scroll-menu")[0];
    if (this.scrollwrap.scrollHeight > this.scrollwrap.clientHeight) {
      scrollMenu.classList.remove("hide");
    }
  }

  scrollMax() {
    // let scrollPos = asideMenu.scrollTop;
    // asideMenu.scrollTop = scrollPos - 200;
    this.scrollwrap.scrollBy({
      top: -150,
      left: 0,
      behavior: 'smooth' // or can add css to relevent element for smooth scrolling
    });
  }

  scrollMin() {
    // let scrollPos = asideMenu.scrollTop;
    this.scrollwrap.scrollBy({
      top: 150,
      left: 0,
      behavior: 'smooth'
    });
  }

}
