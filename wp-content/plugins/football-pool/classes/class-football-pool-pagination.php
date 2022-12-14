<?php

/*
 * Football Pool WordPress plugin
 *
 * @copyright Copyright (c) 2012-2021 Antoine Hurkmans
 * @link https://wordpress.org/plugins/football-pool/
 * @license https://plugins.svn.wordpress.org/football-pool/trunk/LICENSE
 */

/** @noinspection HtmlUnknownTarget */

class Football_Pool_Pagination {
	public $show_total = true;
	public $current_page = 1;
	public $wrap = false;
	
	private $page_param = 'paged';
	private $url = "";
	private $query_arg = array();
	private $total_pages = 0;
	private $total_items = 0;
	private $page_size = FOOTBALLPOOL_DEFAULT_PAGINATION_PAGE_SIZE;
	
	public function __construct( $num_items, $wrap = false ) {
		$this->total_items = $num_items;
		$this->total_pages = $this->calc_total_pages( $num_items, $this->page_size );
		$this->current_page = $this->get_page_num();
		$this->wrap = $wrap;
	}
	
	public function set_page_param( $page_param ) {
		$this->page_param = $page_param;
		$this->current_page = $this->get_page_num();
	}
	
	public function get_page_param() {
		return $this->page_param;
	}
	
	public function add_query_arg( $key, $value ) {
		$this->query_arg[$key] = $value;
	}
	
	public function remove_query_arg( $key ) {
		unset( $this->query_arg[$key] );
	}
	
	public function set_url( $url ) {
			$this->url = $url;
	}
	
	public function get_url() {
			return $this->url;
	}
	
	public function get_page_size() {
		return $this->page_size;
	}
	public function set_page_size( $size ) {
		$this->page_size = $size;
		$this->total_pages = $this->calc_total_pages( $this->total_items, $this->page_size );
		$this->current_page = $this->get_page_num();
	}

	/** @noinspection PhpInconsistentReturnPointsInspection */
	public function show( $return = 'echo' ) {
		if ( $this->url === "" ) $current_url = set_url_scheme( '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		if ( count( $this->query_arg ) > 0 ) $current_url = add_query_arg( $this->query_arg, $current_url );
			
		if ( $this->total_pages ) {
			$page_class = $this->total_pages < 2 ? ' one-page' : '';
		} else {
			$page_class = ' no-pages';
		}
		
		$output = '';
		if ( $this->wrap ) $output .= sprintf( '<div class="tablenav top%s">', $page_class );
		
		$output .= sprintf( '<div class="tablenav-pages%s">', $page_class );
		if ( $this->show_total ) {
			$output .= sprintf( '<span class="displaying-num">%s</span>'
				, sprintf( _n( '1 item', '%s items', $this->total_items, 'football-pool' ), $this->total_items )
			);
		}
		
		$disable_first = $disable_last = $disable_next = $disable_prev = '';
		$disabled_css = ' tablenav-pages-navspan disabled';
		if ( $this->current_page === 1 ) {
			$disable_first = $disabled_css;
			$disable_prev = $disabled_css;
		} elseif ( $this->current_page === 2 ){
			$disable_first = $disabled_css;
		} elseif ( $this->current_page === ( $this->total_pages - 1 ) ) {
			$disable_last = $disabled_css;
		} elseif ( $this->current_page === $this->total_pages ) {
			$disable_last = $disabled_css;
			$disable_next = $disabled_css;
		}
		
		$output .= '<span class="pagination-links">';
		$output .= sprintf( '<a class="first-page button%s" title="%s" href="%s">&laquo;</a>'
							, $disable_first
							, esc_attr__( 'Go to the first page', 'football-pool' )
							, esc_url( remove_query_arg( $this->page_param, $current_url ) )
					);
		$output .= sprintf( '<a class="prev-page button%s" title="%s" href="%s">&lsaquo;</a>'
							, $disable_prev
							, esc_attr__( 'Go to the previous page', 'football-pool' )
							, esc_url( add_query_arg( 
											$this->page_param, max( 1, $this->current_page - 1 ), 
											$current_url ) )
					);

		$output .= sprintf(
			'<span class="paging-input">
				<input class="current-page" title="%s" type="text" name="%s" value="%d" size="%d"> %s 
				<span class="total-pages">%d</span></span>'
			, esc_attr__( 'Current page', 'football-pool' )
			, $this->page_param
			, $this->current_page
			, strlen( $this->total_pages )
			, _x( 'of', 'used in pagination, e.g. 1 of 5', 'football-pool' )
			, $this->total_pages
		);

		$output .= sprintf( '<a class="next-page button%s" title="%s" href="%s">&rsaquo;</a>'
			, $disable_next
			, esc_attr__( 'Go to the next page', 'football-pool' )
			, esc_url( add_query_arg(
							$this->page_param, min( $this->total_pages, $this->current_page + 1 ),
							$current_url ) )
		);
		$output .= sprintf( '<a class="last-page button%s" title="%s" href="%s">&raquo;</a>'
			, $disable_last
			, esc_attr__( 'Go to the last page', 'football-pool' )
			, esc_url( add_query_arg( $this->page_param, $this->total_pages, $current_url ) )
		);
		$output .= '</span></div>';
		
		if ( $this->wrap ) $output .= '</div>';
		
		if ( $return === 'echo' ) {
			echo $output;
		} else {
			return $output;
		}
	}
	
	private function calc_total_pages( $num_items, $page_size ) {
		if ( $page_size <= 0 ) $page_size = FOOTBALLPOOL_DEFAULT_PAGINATION_PAGE_SIZE;
		return (int) ceil( $num_items / $page_size );
	}
	
	private function get_page_num() {
		$page_num = Football_Pool_Utils::request_int( $this->page_param, 0 );

		if( $page_num > $this->total_pages ) {
			$page_num = $this->total_pages;
		}
		
		return max( 1, $page_num );
	}

}
