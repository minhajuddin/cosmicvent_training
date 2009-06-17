class ClientWorkoutsController < ApplicationController
  # GET /client_workouts
  # GET /client_workouts.xml
  def index
    @client_workouts = ClientWorkout.find(:all)

    respond_to do |format|
      format.html # index.html.erb
      format.xml  { render :xml => @client_workouts }
    end
  end

  # GET /client_workouts/1
  # GET /client_workouts/1.xml
  def show
    @client_workout = ClientWorkout.find(params[:id])

    respond_to do |format|
      format.html # show.html.erb
      format.xml  { render :xml => @client_workout }
    end
  end

  # GET /client_workouts/new
  # GET /client_workouts/new.xml
  def new
    @client_workout = ClientWorkout.new

    respond_to do |format|
      format.html # new.html.erb
      format.xml  { render :xml => @client_workout }
    end
  end

  # GET /client_workouts/1/edit
  def edit
    @client_workout = ClientWorkout.find(params[:id])
  end

  # POST /client_workouts
  # POST /client_workouts.xml
  def create
    @client_workout = ClientWorkout.new(params[:client_workout])

    respond_to do |format|
      if @client_workout.save
        flash[:notice] = 'ClientWorkout was successfully created.'
        format.html { redirect_to(@client_workout) }
        format.xml  { render :xml => @client_workout, :status => :created, :location => @client_workout }
      else
        format.html { render :action => "new" }
        format.xml  { render :xml => @client_workout.errors, :status => :unprocessable_entity }
      end
    end
  end

  # PUT /client_workouts/1
  # PUT /client_workouts/1.xml
  def update
    @client_workout = ClientWorkout.find(params[:id])

    respond_to do |format|
      if @client_workout.update_attributes(params[:client_workout])
        flash[:notice] = 'ClientWorkout was successfully updated.'
        format.html { redirect_to(@client_workout) }
        format.xml  { head :ok }
      else
        format.html { render :action => "edit" }
        format.xml  { render :xml => @client_workout.errors, :status => :unprocessable_entity }
      end
    end
  end

  # DELETE /client_workouts/1
  # DELETE /client_workouts/1.xml
  def destroy
    @client_workout = ClientWorkout.find(params[:id])
    @client_workout.destroy

    respond_to do |format|
      format.html { redirect_to(client_workouts_url) }
      format.xml  { head :ok }
    end
  end
  
  def find
    @client_workouts = ClientWorkout.find(:all, :conditions=>["client_name = ? OR trainer = ? ", params[:search_string], params[:search_string]])
  end
  
end
