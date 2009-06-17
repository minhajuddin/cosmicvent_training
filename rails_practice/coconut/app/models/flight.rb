class Flight < ActiveRecord::Base
  has_many :seats
end
