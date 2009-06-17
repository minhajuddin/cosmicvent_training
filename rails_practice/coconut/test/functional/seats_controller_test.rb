require File.dirname(__FILE__) + '/../test_helper'

class SeatsControllerTest < ActionController::TestCase
  def test_should_get_index
    get :index
    assert_response :success
    assert_not_nil assigns(:seats)
  end

  def test_should_get_new
    get :new
    assert_response :success
  end

  def test_should_create_seat
    assert_difference('Seat.count') do
      post :create, :seat => { }
    end

    assert_redirected_to seat_path(assigns(:seat))
  end

  def test_should_show_seat
    get :show, :id => seats(:one).id
    assert_response :success
  end

  def test_should_get_edit
    get :edit, :id => seats(:one).id
    assert_response :success
  end

  def test_should_update_seat
    put :update, :id => seats(:one).id, :seat => { }
    assert_redirected_to seat_path(assigns(:seat))
  end

  def test_should_destroy_seat
    assert_difference('Seat.count', -1) do
      delete :destroy, :id => seats(:one).id
    end

    assert_redirected_to seats_path
  end
end
