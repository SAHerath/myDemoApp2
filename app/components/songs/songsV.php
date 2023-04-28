<?php include_once(APPROOT . '/includes/header.php'); ?>
<?php include_once(APPROOT . '/includes/navigation.php'); ?>
<main class="main">
  <div class="main-header">
    <div class="heading">
      <h2>Songs</h2>
    </div>

    <ul class="breadcrumb">
      <li><a href="<?php echo URLROOT; ?>home">Home</a></li>
      <li>Songs</li>
    </ul>

  </div>
  <div class="main-cards">

    <!--CARD: category list-->
    <div class="card">
      <div id="tbl_data_list">
        <div class="dlist_top">
          <div class="fleft">
            <span id="dl_detail">Pages</span>
          </div>
          <div class="fright">
            <input id="dl_search_inp" type="text" minlength="3">
            <a class="btn purple" id="dl_search_btn" tabindex="0">Search</a>
          </div>
        </div>
        <div class="table-wrap">
          <div class="table">
            <div class="thead">
              <div class="tr">
                <div class="th" id="dl_sort_1" style="width: 50px;">ID<i class="fas fa-exchange-alt fa-rotate-90"></i></div>
                <div class="th" id="dl_sort_2">TITLE<i class="fas fa-exchange-alt fa-rotate-90"></i></div>
                <div class="th" id="dl_sort_3">ARTIST<i class="fas fa-exchange-alt fa-rotate-90"></i></div>
                <div class="th" id="dl_sort_4" style="width: 150px;">GENRE<i class="fas fa-exchange-alt fa-rotate-90"></i></div>
                <div class="th" id="dl_sort_5" style="width: 100px;">YEAR<i class="fas fa-exchange-alt fa-rotate-90"></i></div>
                <div class="th" id="dl_sort_6" style="width: 100px;">DURATION</div>
              </div>
            </div>
            <div class="tbody stripes" id="dl_tbl_body">
              <div class="tr">
                <!-- <div class="td">1</div> -->
                <div class="td">1</div>
                <div class="td">song 1</div>
                <div class="td">artist 1</div>
                <div class="td">genre 1</div>
                <div class="td">2021</div>
                <div class="td">321</div>
              </div>
            </div>
          </div>
        </div>
        <div class="dlist_bot">
          <button class="btn purple" id="dl_prev"><i class="fas fa-caret-left"></i> Previous</button>
          <button class="btn purple" id="dl_next">Next <i class="fas fa-caret-right"></i></button>
        </div>
      </div>
    </div>

  </div>
</main>

<script type="text/javascript">
  const urlroot = "<?php echo URLROOT; ?>songs/";
  /////////////////////////////////////////////////////////////////////////////

  const tblBody = document.getElementById("dl_tbl_body");

  function createTblRow(dataRow) {

    let tblRow = document.createElement("div");
    tblRow.className = "tr";
    tblRow.dataset.rowId = dataRow["id"];

    // create ID column
    let tblData1 = document.createElement("div");
    tblData1.className = "td";
    tblRow.appendChild(tblData1);
    let span1 = document.createElement("span");
    span1.textContent = dataRow["id"];
    tblData1.appendChild(span1);

    // create TITLE column
    let tblData2 = document.createElement("div");
    tblData2.className = "td";
    tblRow.appendChild(tblData2);
    let span2 = document.createElement("span");
    span2.textContent = dataRow["title"];
    tblData2.appendChild(span2);

    // create ARTIST column
    let tblData3 = document.createElement("div");
    tblData3.className = "td";
    tblRow.appendChild(tblData3);
    let span3 = document.createElement("span");
    span3.textContent = dataRow["artist"];
    tblData3.appendChild(span3);

    // create GENRE column
    let tblData4 = document.createElement("div");
    tblData4.className = "td";
    tblRow.appendChild(tblData4);
    let span4 = document.createElement("span");
    span4.textContent = dataRow["genre"];
    tblData4.appendChild(span4);

    // create YEAR column
    let tblData5 = document.createElement("div");
    tblData5.className = "td";
    tblRow.appendChild(tblData5);
    let span5 = document.createElement("span");
    span5.textContent = dataRow["year"];
    tblData5.appendChild(span5);

    // create YEAR column
    let tblData6 = document.createElement("div");
    tblData6.className = "td";
    tblRow.appendChild(tblData6);
    let span6 = document.createElement("span");
    span6.textContent = dataRow["dur"];
    tblData6.appendChild(span6);
    return tblRow;
  }

  function displayData(result) {
    // console.log("Reload Dataset");
    tblBody.textContent = "";

    for (const row of result) {
      let tblRow = createTblRow(row);
      tblBody.appendChild(tblRow);
    }
  }


  let dataList = new DataList(`${urlroot}getSongsDataset`, displayData);
  dataList.setControls("dl_prev", "dl_next");
  dataList.setDetail("dl_detail");
  dataList.setSortHeader("dl_sort_1", "dl_sort_2", "dl_sort_3", "dl_sort_4", "dl_sort_5");
  dataList.setSearch('dl_search_inp', 'dl_search_btn');
</script>
<?php include_once(APPROOT . '/includes/footer.php'); ?>