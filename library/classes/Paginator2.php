<?php
/** Paginator.php
 * A convenient class to paginate an arbitrary number of elements.
 * Required parameters:
    @param $elements the total number of elements to paginate.
    @param $current_page the current page.
 * Optional parameters:
    @param $elements_per_page number of desired elements per page.
 * For the paginate() function is also required the URL, that must respect this format: http://example.com/elements.php?page=$1 (where $1 is the placeholder for page).
 * @version  1.2 - 28/08/2012
 * @author   Simone <hello@simonewebdesign.it>
*/

class Paginator2 {

  /* From MySQL query syntax: http://dev.mysql.com/doc/refman/5.0/en/select.html
  * [LIMIT {[offset,] row_count | row_count OFFSET offset}]
  */
  var $offset = 0;             // where to start displaying elements
	var $elements_per_page = 0;  // limit

  var $page	= 0;               // current page
  var $pages = 0;              // all pages
  var $elements = 0;           // all elements
  var $displayed_elements = 0; // elements in the current page

  var $url = '';               // URL with page placeholder ($1).

  /*setters*/
  function setElements($elements) {
    $this->elements = $elements;
  }
  function setElementsPerPage($elements_per_page) {
    $this->elements_per_page = $elements_per_page;
  }
  function setPage($current_page=1) {
    // paginate
    $this->page =   (int) ($current_page > 0 ? $current_page : 1);
    $this->offset = (int) $this->page * $this->elements_per_page - $this->elements_per_page;
    $this->pages =  (int) ceil( $this->elements / $this->elements_per_page );
    $this->displayed_elements = $this->page == $this->pages ? $this->elements % $this->elements_per_page : $this->elements_per_page;
  }
    function setURL($url) {
    $this->url = $url;
  }

  /*getters*/
  function getPage() {
    return $this->page;
  }
  function getPages() {
    return $this->pages;
  }
  function getOffset() {
    return $this->offset;
  }
  function getElements() {
    return $this->elements;
  }
  function getElementsPerPage() {
    return $this->elements_per_page;
  }
  function getDisplayedElements() {
    return $this->displayed_elements;
  }
  function getElementsFrom() {
    return $this->offset + 1;
  }
  function getElementsTo() {
    return $this->offset + $this->displayed_elements;
  }
  function URLreplacedWithPage($p) {
    return str_replace('$1', $p, $this->url);
  }

  function paginate() {
    /*
    */
    $html = '<div id="pages">';
      $html .= '<ul class="clearfix">';
      if ($this->elements > $this->elements_per_page) {
        if ($this->page > 0) {
          if ($this->page > 1) {
            // we are not in the first page, so we print the first navigation arrows
            $html .= '<li>';
              $html .= '<a href="' . $this->URLreplacedWithPage(1) . '"> &lt;&lt; </a>'; // first page
            $html .= '</li>';
            $html .= '<li>';
              $html .= '<a href="' . $this->URLreplacedWithPage($this->page - 1) . '"> &lt; </a>'; // previous page
            $html .= '</li>';
          }

          for ($i=1; $i <= $this->pages; $i++) {
            $html .= '<li>';
              $html .= '<a href="' . $this->URLreplacedWithPage($i) . '"';
              if ($i == $this->page) {
                // we're printing the current page
                $html .= ' class="current"';
              }
              $html .= '>' . $i . '</a>';
            $html .= '</li>';
          }

          if ($this->page < $this->pages) {
            // we are not in the last page, so we print the last navigation arrows
            $html .= '<li>';
              $html .= '<a href="' . $this->URLreplacedWithPage($this->page + 1) . '"> &gt; </a>'; // next page
            $html .= '</li>';
            $html .= '<li>';
              $html .= '<a href="' . $this->URLreplacedWithPage($this->pages) . '"> &gt;&gt; </a>'; // last page
            $html .= '</li>';
          }
        }
      }
      $html .= '</ul>';
    $html .= '</div>';
    return $html;
  } // end paginate
} // end Paginator